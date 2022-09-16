@extends('frondend.layouts.master')

@section('frontend_title','Shop Page')

@section('frontend_content')
    @include('frondend.layouts.inc.breadcumb',['pagename'=>'Shop'])
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a data-toggle="tab" href="#{{$category->slug}}">{{$category->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">
                        @foreach ($allproducts as $product)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img src="{{asset('uploads/product')}}/{{$product->product_image}}" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{route('productdetails.page',$product->product_slug)}}"><i class="fa fa-shopping-bag"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('productdetails.page',$product->product_slug)}}">{{$product->product_name}}</a></h3>
                                        <p class="pull-left">${{$product->product_price}}

                                        </p>
                                        <ul class="pull-right d-flex">
                                            @for ($i = 0; $i < $product->product_rating; $i++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                        <div class="col-12 text-center d-flex justify-content-center">
                            <div class="py">{{$allproducts->links()}}</div>
                        </div>
                    </ul>
                </div>
                @foreach ($categories as $category)
                <div class="tab-pane" id="{{$category->slug}}">
                    <ul class="row">
                        @foreach ($category->products as $cProduct)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>New</span>
                                    <img src="{{asset('uploads/product')}}/{{$cProduct->product_image}}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{route('productdetails.page',$product->product_slug)}}"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{$cProduct->product_slug}}">{{$cProduct->product_name}}</a></h3>
                                    <p class="pull-left">${{$cProduct->product_price}}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        @for ($i = 1; $i < $cProduct->product_rating; $i++)
                                            <li><i class="fa fa-star"></i></li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- product-area end -->

@endsection
