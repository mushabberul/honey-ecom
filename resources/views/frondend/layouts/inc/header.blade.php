<!-- header-area start -->
<header class="header-area">
    <div class="header-top bg-2">
        <div class="fluid-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <ul class="d-flex header-contact">
                        <li><i class="fa fa-phone"></i> +8801765561008</li>
                        <li><i class="fa fa-envelope"></i> support@honeyecom.com</li>
                    </ul>
                </div>
                <div class="col-md-6 col-12">
                    <ul class="d-flex account_login-area">
                        @auth
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="{{route('cart.page')}}">Cart</a></li>
                                    <li><a href="{{route('customar.checkoutpage')}}">Checkout</a></li>
                                    <li><a href="{{route('customar.logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        @endauth
                        @guest
                            <li><a href="{{route('login.page')}}"> Login </a></li>
                            <li><a href="{{route('register.page')}}"> Register </a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="fluid-container">
            <div class="row">
                <div class="col-lg-3 col-md-7 col-sm-6 col-6">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets/frontend/')}}/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <nav class="mainmenu">
                        <ul class="d-flex">
                            <li class=""><a href="{{route('home')}}">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li>
                                <a href="javascript:void(0);">Shop <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_style">
                                    <li><a href="{{route('shop.page')}}">Shop Page</a></li>
                                    <li><a href="{{route('cart.page')}}">Shopping cart</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 col-lg-2 col-sm-5 col-4">
                    <ul class="search-cart-wrapper d-flex">
                        <li class="search-tigger"><a href="javascript:void(0);"><i class="flaticon-search"></i></a></li>

                        <li>
                            <a href="javascript:void(0);">
                                <i class="flaticon-shop"></i>
                                <span>
                                    {{Cart::content()->count()}}
                                </span>
                            </a>
                            <ul class="cart-wrap dropdown_style">
                                @php
                                    $cartItems = Gloudemans\Shoppingcart\Facades\Cart::content();
                                    $subtotal = Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                                @endphp
                                @foreach ($cartItems as $cartItem)
                                <li class="cart-items">
                                    <div class="cart-img">
                                        <img style="width: 60px;" src="{{asset('uploads/product')}}/{{$cartItem->options->product_image}}" alt="">
                                    </div>
                                    <div class="cart-content">
                                        <a href="{{route('cart.page')}}">{{$cartItem->name}}</a>
                                        <span>QTY : {{$cartItem->qty}}</span>
                                        <p>${{$cartItem->price}}</p>
                                        <a href="{{route('removecartitem',$cartItem->rowId)}}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </li>
                                @endforeach
                                <li>Subtotol: <span class="pull-right">${{$subtotal}}</span></li>
                                <li>
                                    <a href="{{route('customar.checkoutpage')}}" class="btn btn-danger text-white">Check Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 col-2 d-block d-lg-none">
                    <div class="responsive-menu-tigger">
                        <a href="javascript:void(0);">
                    <span class="first"></span>
                    <span class="second"></span>
                    <span class="third"></span>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
        <div class="responsive-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-block d-lg-none">
                        <ul class="metismenu">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Shop </a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('shop.page')}}">Shop Page</a></li>
                                    <li><a href="{{route('cart.page')}}">Shopping cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Pages </a>
                                <ul aria-expanded="false">
                                    <li><a href="about.html">About Page</a></li>
                                    <li><a href="{{route('cart.page')}}">Shopping cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                </ul>
                            </li>
                            <li class="sidemenu-items">
                                <a class="has-arrow" aria-expanded="false" href="javascript:void(0);">Blog</a>
                                <ul aria-expanded="false">
                                    <li><a href="blog.html">Blog</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                        </div>
                </div>
            </div>
        </div>
        <!-- responsive-menu area start -->
    </div>
</header>
<!-- header-area end -->
