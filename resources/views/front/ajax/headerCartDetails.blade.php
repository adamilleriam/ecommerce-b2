<div class="dropdown-cart-header">
    <span>{{ count($cart) }} Items</span>

    <a href="cart.html">View Cart</a>
</div><!-- End .dropdown-cart-header -->
<div class="dropdown-cart-products">
    @php
        $total = 0;
    @endphp
    @if($cart != null)
        @foreach($cart as $item)
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