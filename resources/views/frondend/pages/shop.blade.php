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
                                                <li><a data-toggle="modal" data-target="#{{$product->product_slug}}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
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
                            <!-- Modal area start -->
                            <div class="modal fade" id="{{$product->product_slug}}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="modal-body d-flex">
                                            <div class="product-single-img w-50">
                                                <img src="{{asset('uploads/product')}}/{{$product->product_image}}" alt="">
                                            </div>
                                            <div class="product-single-content w-50">
                                                <h3>{{$product->product_name}}</h3>
                                                <div class="rating-wrap fix">
                                                    <span class="pull-left">${{$product->product_price}}</span>
                                                    <ul class="rating pull-right">
                                                        @for ($i=0; $i < $product->product_rating; $i++)
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
                                                            <button style="width:155px; position:absulate;left:2px;font-size:15px; top:-30px;" class="btn btn-danger" type="submit">Add  to Cart</button>
                                                        </li>
                                                    </form>
                                                </ul>
                                                <ul class="cetagory">
                                                    <li>Categories:</li>
                                                    <li><a href="#">{{$product->category->title}}</a></li>
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
                                </div>
                            </div>
                            <!-- Modal area end -->
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
                                                    <li><a data-toggle="modal" data-target="#{{$cProduct->product_slug}}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
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
                                <!-- Modal area start -->
                                <div class="modal fade" id="{{$cProduct->product_slug}}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="modal-body d-flex">
                                                <div class="product-single-img w-50">
                                                    <img src="{{asset('uploads/product')}}/{{$cProduct->product_image}}" alt="">
                                                </div>
                                                <div class="product-single-content w-50">
                                                    <h3>{{$cProduct->product_name}}</h3>
                                                    <div class="rating-wrap fix">
                                                        <span class="pull-left">${{$cProduct->product_price}}</span>
                                                        <ul class="rating pull-right">
                                                            @for ($i=0; $i < $cProduct->product_rating; $i++)
                                                                <li><i class="fa fa-star"></i></li>
                                                            @endfor
                                                            <li>(0{{$cProduct->product_rating}} Customar Review)</li>
                                                        </ul>
                                                    </div>
                                                    <p>{{$cProduct->product_short_description}}</p>
                                                    <ul class="input-style">
                                                        <form action="{{route('add-to.cart')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_slug" value="{{$cProduct->product_slug}}">
                                                            <li class="quantity cart-plus-minus">
                                                                <input type="text" name="order_qty" value="1" />
                                                            </li>
                                                            <li>
                                                                <button style="width:155px; position:absulate;left:2px;font-size:15px; top:-30px;" class="btn btn-danger" type="submit">Add  to Cart</button>
                                                            </li>
                                                        </form>
                                                    </ul>
                                                    <ul class="cetagory">
                                                        <li>Categories:</li>
                                                        <li><a href="#">{{$cProduct->category->title}}</a></li>
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
                                    </div>
                                </div>
                                <!-- Modal area end -->
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- product-area end -->
@endsection
