<!-- latest product-area start -->
<div class="product-area">
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Our Latest Product</h2>
                    <img src="{{asset('assets/frontend/')}}/images/section-title.png" alt="">
                </div>
            </div>
        </div>
        <ul class="row">
            @foreach ($products as $product)
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
                            @for ($start = 0; $start<$product->product_rating; $start++)
                                <li><i class="fa fa-star"></i></li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </li>
            @endforeach

            <div class="col-12 text-center d-flex justify-content-center">
                <div class="py">{{$products->links()}}</div>
            </div>
        </ul>
    </div>
</div>
<!-- latest product-area end -->
