<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartPage()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frondend.pages.shopping-cart', compact('carts', 'total', 'subtotal'));
    }

    public function addToCart(Request $request)
    {
        //return $request;
        $product_slug = $request->product_slug;
        $order_qty = $request->order_qty;

        $product = Product::where('product_slug', $product_slug)->first();

        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => $order_qty,
            'weight' => 0,
            'options' => [
                'product_image' => $product->product_image,
            ]

        ]);

        Toastr::success('Product Added in to Cart');
        return back();
    }
    public function removeCartItem($cart_item_id)
    {
        $remove = Cart::remove($cart_item_id);
        Toastr::info('Product Removed form Cart');
        return back();
    }

    public function applyCoupon(Request $request)
    {
        if (!Auth::check()) {
            Toastr::error('You must need to login first');
            return redirect()->route('login.page');
        }

        if(Session::get('coupon')){
            Toastr::error('Coupon already appied','info!');
            return back();
        }

        $coupon_name = $request->coupon_name;
        $check = Coupon::where('coupon_name', $coupon_name)->first();

        if ($check != null) {
            $validate = $check->validity_till > Carbon::now()->format('Y-m-d');
            if ($validate == 1) {
                Session::put('coupon', [
                    'name' => $check->coupon_name,
                    'discount_amount' => round(($check->discount_amount * Cart::totalFloat()) / 100),
                    'cart_total' => Cart::subtotal(),
                    'balance' => round(Cart::totalFloat() - (Cart::totalFloat() * $check->discount_amount) / 100)
                ]);

                Toastr::success('Coupon applied successfully');
                return back();
            } else {
                Toastr::error('Coupon date expaired!');
                return back();
            }
        } else {
            Toastr::error('Invalid coupon code');
            return back();
        }
    }
    public function removeCoupon($coupon_name)
    {
        Session::forget('coupon');
        Toastr::info('Coupon removed','Successfully');
        return back();
    }
}
