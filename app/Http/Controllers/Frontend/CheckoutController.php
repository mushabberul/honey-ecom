<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

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

    public function placeOrder(Request $request)
    {
        dd($request->all());
    }
}
