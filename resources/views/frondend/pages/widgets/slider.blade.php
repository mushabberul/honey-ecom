<!-- slider-area start -->
<div class="slider-area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($sProducts as $sProduct)
                <div class="swiper-slide overlay">
                    <div class="single-slider slide-inner slide-inner1">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-lg-9 col-12">
                                    <div class="slider-content">
                                        <div class="slider-shape">
                                            <h2 data-swiper-parallax="-500">{{$sProduct->product_name}}</h2>
                                            <p data-swiper-parallax="-400">{{$sProduct->product_short_description}}</p>
                                            <a href="{{route('shop.page')}}" data-swiper-parallax="-300">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- slider-area end -->
