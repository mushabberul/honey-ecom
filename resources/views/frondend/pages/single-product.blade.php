@extends('frondend.layouts.master')

@section('frontend_title','Product Details')
@section('frontend_content')
    @include('frondend.layouts.inc.breadcumb',['pagename'=>"$product->product_name"])

    <!-- single-product-area start-->
    <div class="single-product-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="{{asset('uploads/product')}}/{{$product->product_image}}" alt="">
                            </div>
                            @foreach ($product->productImages as $image)
                                <div class="item">
                                    <img src="{{asset('uploads/product')}}/{{$image->multiple_product_image}}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img src="{{asset('uploads/product')}}/{{$product->product_image}}" alt="">
                            </div>
                            @foreach ($product->productImages as $image)
                                <div class="item">
                                    <img src="{{asset('uploads/product')}}/{{$image->multiple_product_image}}" alt="">
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-single-content">
                        <h3>{{$product->product_name}}</h3>
                        <div class="rating-wrap fix">
                            <span class="pull-left">${{$product->product_price}}</span>
                            <ul class="rating pull-right">
                                @for ($i = 0; $i < $product->product_rating; $i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                                <li>(0{{$product->product_rating}} Customar Review)</li>
                            </ul>
                        </div>
                        <p>{{$product->product_short_description}}</p>
                        <ul class="input-style">
                            <form action="{{route('add-to.cart')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_slug" value="{{$product->product_slug}}">
                                <li class="quantity cart-plus-minus">
                                    <input type="text" name="order_qty" value="1" />
                                </li>
                                <li>
                                    <button class="btn btn-danger" type="submit">Add  to Cart</button>
                                </li>
                            </form>
                        </ul>
                        <ul class="cetagory">
                            <li>Categories:</li>
                            <li><a href="{{route('shop.page')}}">{{$product->category->title}}</a></li>
                        </ul>
                        <ul class="socil-icon">
                            <li>Share :</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-12">
                    <div class="single-product-menu">
                        <ul class="nav">
                            <li><a class="active" data-toggle="tab" href="#description">Description</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <div class="description-wrap">
                                <p>{{$product->product_long_description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single-product-area end-->
    <!-- related-product-area start -->
    <div class="featured-product-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-left">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="featured-product-wrap">
                        <div class="featured-product-img">
                            <img src="{{asset('uploads/product')}}/{{$relatedProduct->product_image}}" alt="">
                        </div>
                        <div class="featured-product-content">
                            <div class="row">
                                <div class="col-7">
                                    <h3><a href="{{route('productdetails.page',$relatedProduct->product_slug)}}">{{$relatedProduct->product_name}}</a></h3>
                                    <p>${{$relatedProduct->product_price}}</p>
                                </div>
                                <div class="col-5 text-right">
                                    <ul>
                                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li><a href="cart.html"><i class="fa fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- related-product-area end -->

@endsection
