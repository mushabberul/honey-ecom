<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::latest('id')->limit(5)->select(['id', 'title', 'category_image'])->get();
        $testimonials = Testimonial::latest('id')->limit(5)->select(['id', 'client_name', 'client_designation', 'client_image', 'client_message'])->get();
        //return $testimonials;
        //return $categories;
        return view('frondend.pages.home', compact('categories', 'testimonials'));
    }
}
