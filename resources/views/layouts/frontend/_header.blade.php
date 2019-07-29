<div class="header-top">
    <div class="container">
        <div class="header-left header-dropdowns">
            <div class="header-dropdown">
                <a href="#">USD</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="#">EUR</a></li>
                        <li><a href="#">USD</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropown -->

            <div class="header-dropdown">
                <a href="#"><img src="{{ asset('assets/frontend/images/flags/en.png') }}" alt="England flag">ENGLISH</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="#"><img src="{{ asset('assets/frontend/images/flags/en.png') }}" alt="England flag">ENGLISH</a></li>
                        <li><a href="#"><img src="{{ asset('assets/frontend/images/flags/fr.png') }}" alt="France flag">FRENCH</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropown -->

            <div class="dropdown compare-dropdown">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <i class="icon-retweet"></i> Compare (2)
                </a>

                <div class="dropdown-menu" >
                    <div class="dropdownmenu-wrapper">
                        <ul class="compare-products">
                            <li class="product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                <h4 class="product-title"><a href="product.html">Lady White Top</a></h4>
                            </li>
                            <li class="product">
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                <h4 class="product-title"><a href="product.html">Blue Women Shirt</a></h4>
                            </li>
                        </ul>

                        <div class="compare-actions">
                            <a href="#" class="action-link">Clear All</a>
                            <a href="#" class="btn btn-primary">Compare</a>
                        </div>
                    </div><!-- End .dropdownmenu-wrapper -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .dropdown -->
        </div><!-- End .header-left -->

        <div class="header-right">
            <p class="welcome-msg">Default welcome msg! </p>

            <div class="header-dropdown dropdown-expanded">
                <a href="#">Links</a>
                <div class="header-menu">
                    <ul>
                        <li><a href="my-account.html">MY ACCOUNT </a></li>
                        <li><a href="#">DAILY DEAL</a></li>
                        <li><a href="#">MY WISHLIST </a></li>
                        <li><a href="blog.html">BLOG</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#" class="login-link">LOG IN</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropown -->
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-top -->

<div class="header-middle">
    <div class="container">
        <div class="header-left">
            <a href="index-2.html" class="logo">
                <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="Porto Logo">
            </a>
        </div><!-- End .header-left -->

        <div class="header-center">
            <div class="header-search">
                <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                <form action="#" method="get">
                    <div class="header-search-wrapper">
                        <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                        <div class="select-custom">
                            <select id="cat" name="cat">
                                <option value="">All Categories</option>
                                <option value="4">Fashion</option>
                                <option value="12">- Women</option>
                                <option value="13">- Men</option>
                                <option value="66">- Jewellery</option>
                                <option value="67">- Kids Fashion</option>
                                <option value="5">Electronics</option>
                                <option value="21">- Smart TVs</option>
                                <option value="22">- Cameras</option>
                                <option value="63">- Games</option>
                                <option value="7">Home &amp; Garden</option>
                                <option value="11">Motors</option>
                                <option value="31">- Cars and Trucks</option>
                                <option value="32">- Motorcycles &amp; Powersports</option>
                                <option value="33">- Parts &amp; Accessories</option>
                                <option value="34">- Boats</option>
                                <option value="57">- Auto Tools &amp; Supplies</option>
                            </select>
                        </div><!-- End .select-custom -->
                        <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                    </div><!-- End .header-search-wrapper -->
                </form>
            </div><!-- End .header-search -->
        </div><!-- End .headeer-center -->

        <div class="header-right">
            <button class="mobile-menu-toggler" type="button">
                <i class="icon-menu"></i>
            </button>
            <div class="header-contact">
                <span>Call us now</span>
                <a href="tel:#"><strong>+000 1584 2578</strong></a>
            </div><!-- End .header-contact -->

            <div class="dropdown cart-dropdown">
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    <span class="cart-count"><span class="totalCartItemHeaderChild">{{ count(session('cart')) }}</span></span>
                </a>

                <div class="dropdown-menu" >
                    <div class="dropdownmenu-wrapper">
                        <span class="headerCartDetails">
                           <div class="dropdown-cart-header">
    <span>{{ count(session('cart')) }} Items</span>

    <a href="cart.html">View Cart</a>
</div><!-- End .dropdown-cart-header -->
<div class="dropdown-cart-products">
    @php
        $total = 0;
    @endphp
    @if(session('cart') != null)
        @foreach(session('cart') as $item)
            <div class="product">
                <div class="product-details">
                    <h4 class="product-title">
                        <a href="{{ route('product.details',$item['product_id']) }}">{{ $item['name'] }}</a>
                    </h4>

                    <span class="cart-product-info">
                                                            <span class="cart-product-qty">{{ $item['quantity'] }}</span>
                                                            x {{ $item['price'] }}
                                                        </span>
                </div><!-- End .product-details -->

                <figure class="product-image-container">
                    <a href="product.html" class="product-image">
                        <img src="{{ asset($item['image']) }}" alt="product">
                    </a>
                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                </figure>
            </div><!-- End .product -->
            @php

                $total += $item['quantity'] * $item['price'];

            @endphp
        @endforeach
    @endif

</div><!-- End .cart-product -->

<div class="dropdown-cart-total">
    <span>Total</span>

    <span class="cart-total-price">{{ $total }}/-</span>
</div><!-- End .dropdown-cart-total -->

                        </span>

                        <div class="dropdown-cart-action">
                            <a href="{{ route('checkout') }}" class="btn btn-block">Checkout</a>
                            <a href="{{ route('cart') }}" class="btn btn-block">Cart</a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdownmenu-wrapper -->
                </div><!-- End .dropdown-menu -->
            </div><!-- End .dropdown -->
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-middle -->

<div class="header-bottom sticky-header">
    <div class="container">
        <nav class="main-nav">
            <ul class="menu sf-arrows">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li>
                    <a href="#" class="sf-with-ul">Categories</a>
                    <div class="megamenu megamenu-fixed-width">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="menu-title">
                                            <a href="{{ route('front.product.index') }}">All<span class="tip tip-new">Products</span></a>
                                        </div>
                                        <ul>
                                            @foreach($categories as $id=>$category)
                                                <li><a href="{{ route('front.product.index',$id) }}">{{ $category }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div><!-- End .row -->
                            </div><!-- End .col-lg-8 -->
                            <div class="col-lg-4">
                                <div class="banner">
                                    <a href="#">
                                        <img src="{{ asset('assets/frontend/images/menu-banner-2.jpg') }}" alt="Menu banner">
                                    </a>
                                </div><!-- End .banner -->
                            </div><!-- End .col-lg-4 -->
                        </div>
                    </div><!-- End .megamenu -->
                </li>
                <li class="megamenu-container">
                    <a href="{{ route('front.product.index') }}" class="sf-with-ul">Products</a>
                </li>
                <li>
                    <a href="#" class="sf-with-ul">Pages</a>

                    <ul>
                        <li><a href="cart.html">Shopping Cart</a></li>
                        <li><a href="#">Checkout</a>
                            <ul>
                                <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                <li><a href="checkout-review.html">Checkout Review</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dashboard</a>
                            <ul>
                                <li><a href="dashboard.html">Dashboard</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single.html">Blog Post</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#" class="login-link">Login</a></li>
                        <li><a href="forgot-password.html">Forgot Password</a></li>
                    </ul>
                </li>
                <li><a href="#" class="sf-with-ul">Features</a>
                    <ul>
                        <li><a href="#">Header Types</a></li>
                        <li><a href="#">Footer Types</a></li>
                    </ul>
                </li>
                <li class="float-right buy-effect"><a href="#"><span>Buy Porto!</span></a></li>
                <li class="float-right"><a href="#">Special Offer!</a></li>
            </ul>
        </nav>
    </div><!-- End .header-bottom -->
</div><!-- End .header-bottom -->