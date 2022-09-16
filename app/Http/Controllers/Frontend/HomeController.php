<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::latest('id')->limit(5)->select(['id', 'title', 'category_image'])->get();
        $testimonials = Testimonial::latest('id')->limit(5)->select(['id', 'client_name', 'client_designation', 'client_image', 'client_message'])->get();
        $products = Product::latest('id')->select(['id','product_name','product_image','product_slug','product_price','product_rating'])->paginate(10);
        //return $testimonials;
        //return $categories;
        //return $products;
        return view('frondend.pages.home', compact('categories', 'testimonials','products'));
    }

    public function shopPage()
    {
        $categories = Category::where('is_active',1)
        ->with('products')
        ->latest('id')
        ->limit(5)
        ->select(['id','title','slug'])
        ->get();

        $allproducts = Product::where('is_active',1)
        ->latest('id')
        ->select(['id','product_name','product_slug','product_image','product_price','product_rating'])
        ->paginate(12);

        //return $categories;
        //return $allproducts;
        return view('frondend.pages.shop',compact('categories','allproducts'));
    }

    public function productDetails($product_slug)
    {
        $product = Product::where('product_slug',$product_slug)
        ->with('category','productImages')
        ->first();

        $relatedProducts = Product::whereNot('product_slug',$product_slug)
        ->limit(4)
        ->select(['id','product_name','product_slug','product_price','product_rating','product_image'])
        ->get();
        //return $relatedProducts;

        //return $product;
        return view('frondend.pages.single-product',compact('product','relatedProducts'));
    }
}
