<!-- best seller product-area start -->
<div class="product-area product-area-2">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Best Seller</h2>
                    <img src="{{asset('assets/frontend/')}}/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
            @foreach ($bestSellingProducts as $bestSellingProduct)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <img src="{{asset('uploads/product')}}/{{$bestSellingProduct->product_image}}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#{{$bestSellingProduct->product_slug}}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{route('productdetails.page',$bestSellingProduct->product_slug)}}"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{route('productdetails.page',$bestSellingProduct->product_slug)}}">{{$bestSellingProduct->product_name}}</a></h3>
                            <p class="pull-left">${{$bestSellingProduct->product_price}}

                            </p>
                            <ul class="pull-right d-flex">
                                @for ($i=0; $i < $bestSellingProduct->product_rating; $i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </li>

                <!-- Modal area start -->
                <div class="modal fade" id="{{$bestSellingProduct->product_slug}}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body d-flex">
                                <div class="product-single-img w-50">
                                    <img src="{{asset('uploads/product')}}/{{$bestSellingProduct->product_image}}" alt="">
                                </div>
                                <div class="product-single-content w-50">
                                    <h3>{{$bestSellingProduct->product_name}}</h3>
                                    <div class="rating-wrap fix">
                                        <span class="pull-left">${{$bestSellingProduct->product_price}}</span>
                                        <ul class="rating pull-right">
                                            @for ($i=0; $i < $bestSellingProduct->product_rating; $i++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
                                            <li>(0{{$bestSellingProduct->product_rating}} Customar Review)</li>
                                        </ul>
                                    </div>
                                    <p>{{$bestSellingProduct->product_short_description}}</p>
                                    <ul class="input-style">
                                        <form action="{{route('add-to.cart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_slug" value="{{$bestSellingProduct->product_slug}}">
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
                                        <li><a href="#">{{$bestSellingProduct->category->title}}</a></li>
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
</div>
<!-- best seller product-area end -->
