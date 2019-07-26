@extends('layouts.frontend.master')
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="product-single-container product-single-default">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 product-single-gallery">
                            <div class="product-slider-container product-item">
                                <div class="product-single-carousel owl-carousel owl-theme">
                                    @foreach($product->product_image as $image)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{ asset($image->file_path) }}" data-zoom-image="{{ asset($image->file_path) }}"/>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                            </div>
                            <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                @foreach($product->product_image as $image)
                                    <div class="col-3 owl-dot">
                                        <img src="{{ asset($image->file_path) }}"/>
                                    </div>
                                @endforeach
                            </div>
                        </div><!-- End .col-lg-7 -->

                        <div class="col-lg-5 col-md-6">
                            <div class="product-single-details">
                                <h1 class="product-title">{{ $product->name }}</h1>

                                <div class="">
                                    <div class="product-ratings">
                                        <span >{{ $product->category->name }}</span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->

                                    <a href="#" class="rating-link">Brand : {{ $product->brand->name }}</a>
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">{{ $product->price }}</span>
                                </div><!-- End .price-box -->

                                <div class="product-desc">
                                    <p>{{ str_limit($product->description,100) }}</p>
                                </div><!-- End .product-desc -->

                                <div class="product-filters-container">
                                    <div class="product-single-filter">
                                        <label>Colors:</label>
                                        <ul class="config-swatch-list">
                                            <li class="active">
                                                <a href="#" style="background-color: {{ $product->color }};"></a>
                                            </li>
                                        </ul>
                                    </div><!-- End .product-single-filter -->
                                </div><!-- End .product-filters-container -->

                                <div class="product-action product-all-icons">
                                    <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control" type="text">
                                    </div><!-- End .product-single-qty -->

                                    <a href="cart.html" class="paction add-cart" title="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>
                                    <a href="#" class="paction add-compare" title="Add to Compare">
                                        <span>Add to Compare</span>
                                    </a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product-single-details -->
                        </div><!-- End .col-lg-5 -->
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Brand</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                {{ $product->description }}
                            </div><!-- End .product-desc-content -->
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                            <div class="product-tags-content">
                                <form action="#">
                                    <h4>Add Your Tags:</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" required>
                                        <input type="submit" class="btn btn-primary" value="Add Tags">
                                    </div><!-- End .form-group -->
                                </form>
                                <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                            </div><!-- End .product-tags-content -->
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                            <div class="product-reviews-content">
                                <div class="add-product-review">
                                    <h1>{{ $product->brand->name }}</h1>
                                    <p>{{ $product->brand->details }}</p>
                                </div><!-- End .add-product-review -->
                            </div><!-- End .product-reviews-content -->
                        </div><!-- End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-single-tabs -->
            </div><!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
            <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget widget-brand">
                        <a href="#">
                            <img src="{{ asset(isset($product->brand->logo)?$product->brand->logo:'assets/frontend/images/products/no-image-available.png') }}" alt="brand name">
                        </a>
                    </div><!-- End .widget -->

                    <div class="widget widget-info">
                        <ul>
                            <li>
                                <i class="icon-shipping"></i>
                                <h4>FREE<br>SHIPPING</h4>
                            </li>
                            <li>
                                <i class="icon-us-dollar"></i>
                                <h4>100% MONEY<br>BACK GUARANTEE</h4>
                            </li>
                            <li>
                                <i class="icon-online-support"></i>
                                <h4>ONLINE<br>SUPPORT 24/7</h4>
                            </li>
                        </ul>
                    </div><!-- End .widget -->

                    <div class="widget widget-banner">
                        <div class="banner banner-image">
                            <a href="#">
                                <img src="{{ asset('assets/frontend/images/banners/banner-sidebar.jpg') }}" alt="Banner Desc">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .widget -->

                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured Products</h3>

                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                                <div class="featured-col">
                                    @foreach($featured_products as $index=>$product)
                                        @if($index <= 2)
                                            <div class="product product-sm">
                                                <figure class="product-image-container">
                                                    <a href="{{ route('product.details',$product->id) }}" class="product-image">
                                                        <img src="{{ asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'assets/frontend/images/products/no-image-available.png') }}" alt="product">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="{{ route('product.details',$product->id) }}">{{ $product->name }}</a>
                                                    </h2>
                                                    <div class="">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:80%">{{ $product->category->name }}</span><!-- End .ratings -->
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">{{ $product->price }}/-</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div><!-- End .product -->
                                        @endif
                                    @endforeach
                                </div><!-- End .featured-col -->
                                <div class="featured-col">
                                    @foreach($featured_products as $index=>$product)
                                        @if($index >= 3)
                                            <div class="product product-sm">
                                                <figure class="product-image-container">
                                                    <a href="{{ route('product.details',$product->id) }}" class="product-image">
                                                        <img src="{{ asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'assets/frontend/images/products/no-image-available.png') }}" alt="product">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="{{ route('product.details',$product->id) }}">{{ $product->name }}</a>
                                                    </h2>
                                                    <div class="">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:80%">{{ $product->category->name }}</span><!-- End .ratings -->
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">{{ $product->price }}/-</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div><!-- End .product -->
                                        @endif
                                    @endforeach
                                </div><!-- End .featured-col -->
                            </div><!-- End .widget-featured-slider -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .widget -->
                </div>
            </aside><!-- End .col-md-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="featured-section">
        <div class="container">
            <h2 class="carousel-title">Latest Products</h2>

            <div class="featured-products owl-carousel owl-theme owl-dots-top">
                @foreach($latest_products as $product)

                    <div class="product">
                        <figure class="product-image-container">
                            <a href="{{ route('product.details',$product->id) }}" class="product-image">
                                <img src="{{ asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'assets/frontend/images/products/no-image-available.png') }}" alt="product">
                            </a>
                            <a href="#" class="btn-quickview">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="ratings-container">
                                <div class="">
                                    <span class="" style="width:60%">{{ $product->category->name }}</span><!-- End .ratings -->
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <h2 class="product-title">
                                <a href="{{ route('product.details',$product->id) }}">{{ $product->name }}</a>
                            </h2>
                            <div class="price-box">
                                <span class="product-price">{{ $product->price }}/-</span>
                            </div><!-- End .price-box -->

                            <div class="product-action">
                                <a href="product.html" class="paction add-cart" title="Add to Cart">
                                    <span>Add to Cart</span>
                                </a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product-details -->
                    </div><!-- End .product -->
                @endforeach
            </div><!-- End .featured-proucts -->
        </div><!-- End .container -->
    </div><!-- End .featured-section -->
@endsection