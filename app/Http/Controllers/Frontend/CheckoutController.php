<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\Billing;
use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\BillingStoreRequest;
use App\Models\OrderDetails;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;

class CheckoutController extends Controller
{
    public function checkoutPage()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $districts = District::select('id','name')->get();
        return view('frondend.pages.checkout',compact('districts','total','subtotal','carts'));
    }

    public function loadUpazillaAjax($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->select('id','name')->get();
        return response()->json($upazilas, 200);
    }

    public function placeOrder(BillingStoreRequest $request)
    {
        $billing = Billing::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'district_id'=>$request->district_id,
            'upazila_id'=>$request->upazila_id,
            'address'=>$request->address,
            'note'=>$request->note,
        ]);

        $subtotal = Cart::subtotalFloat();
        $total = Cart::totalFloat();
        $order = Order::create([
            'user_id'=>Auth::id(),
            'billing_id'=> $billing->id,
            'sub_total'=> Session::get('coupon')['cart_total'] ?? $subtotal,
            'coupon_name'=> Session::get('coupon')['name'] ?? '',
            'discount_amount'=> Session::get('coupon')['discount_amount'] ?? 0,
            'total'=> Session::get('coupon')['balance'] ?? $total,
        ]);

        $cartItems = Cart::content();
        //dd($cartItems);
        foreach($cartItems as $cartItem){
            OrderDetails::create([
                'user_id'=>Auth::id(),
                'order_id'=>$order->id,
                'product_id'=>$cartItem->id,
                'product_price'=>$cartItem->price,
                'product_qty'=>$cartItem->qty,
            ]);

            Product::find($cartItem->id)->decrement('product_stock',$cartItem->qty);
        }
        Cart::destroy();
        Session::forget('coupon');
        Toastr::success('Shopping completed,See you again','Successfully');

        return redirect()->route('cart.page');
    }
}
