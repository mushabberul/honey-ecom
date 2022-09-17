<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('')->group(function(){
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/shop',[HomeController::class,'shopPage'])->name('shop.page');
    Route::get('/single-product/{product_slug}',[HomeController::class,'productDetails'])->name('productdetails.page');
    Route::get('/shopping-cart',[CartController::class,'cartPage'])->name('cart.page');
    Route::post('add-to-cart',[CartController::class,'addToCart'])->name('add-to.cart');
    Route::get('/remove-cart-item/{cart_itme_id}',[CartController::class,'removeCartItem'])->name('removecartitem');
});

Route::prefix('admin')->group(function () {

    Route::get('login', [LoginController::class, 'loginPage']);
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('admin.dashboard');
    });


    Route::resource('category', CategoryController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('products',ProductController::class);
});
