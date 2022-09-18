<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartPage()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frondend.pages.shopping-cart',compact('carts','total','subtotal'));
    }

    public function addToCart(Request $request)
    {
        //return $request;
        $product_slug = $request->product_slug;
        $order_qty = $request->order_qty;

         $product = Product::where('product_slug',$product_slug)->first();

        Cart::add([
            'id'=>$product->id,
            'name'=>$product->product_name,
            'price'=>$product->product_price,
            'qty'=>$order_qty,
            'weight'=>0,
            'options'=>[
                'product_image'=>$product->product_image,
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
        dd($request->all());
    }
}
