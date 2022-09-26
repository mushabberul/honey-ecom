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
        $products = Product::with('category')
        ->latest('id')
        ->select(['id','product_name','product_image','product_slug','product_price','product_rating','category_id'])
        ->paginate(10);
        $sProducts = Product::latest('id')->limit(4)->select(['id','product_name','product_short_description'])->get();
        //return $testimonials;
        //return $categories;
        //return $products;
        $bestSellingProducts = Product::with('category')
        ->select(['id','product_slug','product_rating','product_image','product_name','product_price','category_id'])
        ->orderBy('product_rating','DESC')
        ->limit(4)
        ->get();
        //return $bestSellingProducts;
        return view('frondend.pages.home', compact('categories', 'testimonials','products','sProducts','bestSellingProducts'));
    }

    public function shopPage()
    {
        $categories = Category::where('is_active',1)
        ->with('products')
        ->latest('id')
        ->limit(5)
        ->select(['id','title','slug'])
        ->get();
        //return $categories;

        $allproducts = Product::where('is_active',1)
        ->with('category')
        ->latest('id')
        ->select(['id','product_name','product_slug','product_image','product_price','product_rating','category_id'])
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
