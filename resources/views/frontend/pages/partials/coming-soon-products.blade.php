<section class="special-product section-pt">
    <div class="collection-category">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-capture">
                        <div class="section-title">
                            <div class="section-cont-title">
                                <h2 data-animate="animate__fadeInUp"><span>Coming Soon</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="collection-wrap">
                        <div class="collection-slider swiper" id="special-product1">
                            <div class="swiper-wrapper">
                                @foreach ($comingSoonProducts as $product)
                                    @php
                                        $discount = $product->calculateDiscount();
                                    @endphp
                                    <div class="swiper-slide" data-animate="animate__fadeInUp">
                                        <div class="single-product-wrap">
                                            <div class="product-image banner-hover">
                                                <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                    class="pro-img">
                                                    <img src="{{ $product->image }}" class="img-fluid img1 mobile-img1"
                                                        alt="{{ $product->name }}">
                                                    <img src="{{ $product->image }}" class="img-fluid img2 mobile-img2"
                                                        alt="{{ $product->name }}">
                                                </a>
                                                <div class="product-label pro-new-sale">
                                                    <span
                                                        class="product-label-title">{{ $discount > 0 ? 'Sale' : 'New'}}</span>
                                                </div>
                                                <div class="product-action d-flex gap-2">

                                                    <div>
                                                        <form method="POST"
                                                            action="{{ route('frontend.product.wishlist.add', $product->id) }}">
                                                            @csrf
                                                            <a href="{{ route('frontend.product.wishlist.add', $product->id) }}"
                                                                class="wishlist"
                                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                                <span class="tooltip-text">Wishlist</span>
                                                                <span class="pro-action-icon"><svg viewBox="0 0 24 24"
                                                                        width="24" height="24" stroke="currentColor"
                                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                                        <path
                                                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                                        </path>
                                                                    </svg></span>
                                                            </a>
                                                        </form>
                                                    </div>

                                                    <div>
                                                        <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                            class="quickview">
                                                            <span class="tooltip-text">View</span>
                                                            <span class="pro-action-icon"><svg viewBox="0 0 24 24"
                                                                    width="24" height="24" stroke="currentColor"
                                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round" class="css-i6dzq1">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg></span>
                                                        </a>
                                                    </div>

                                                    <div>
                                                        <form method="POST"
                                                            action="{{ route('frontend.product.cart.add', $product->id) }}">
                                                            @csrf
                                                            <a href="{{ route('frontend.product.cart.add', $product->id) }}"
                                                                class="add-to-cart"
                                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                                <span class="tooltip-text">Add to cart</span>
                                                                <span class="pro-action-icon"><svg viewBox="0 0 24 24"
                                                                        width="24" height="24" stroke="currentColor"
                                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg></span>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-ratting">
                                                    <span class="pro-ratting">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half-stroke"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                        <i class="fa-regular fa-star"></i>
                                                    </span>
                                                </div>
                                                <div class="product-title">
                                                    <h6><a
                                                            href="{{ route('frontend.product.show', $product->slug) }}">{{ $product->name }}</a>
                                                    </h6>
                                                </div>

                                                <div class="product-price">
                                                    <div class="pro-price-box">
                                                        <span class="new-price">AUD {{ $product->price - $discount }}</span>
                                                        @if ($discount > 0)
                                                            <span class="old-price">AUD {{ $product->price }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-description">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy text
                                                        ever since the 1500s, when an unknown printer took a galley of type
                                                    </p>
                                                </div>
                                                <div class="product-action">
                                                    <div>
                                                        <form method="POST"
                                                            action="{{ route('frontend.product.wishlist.add', $product->id) }}">
                                                            @csrf
                                                            <a href="{{ route('frontend.product.wishlist.add', $product->id) }}"
                                                                class="wishlist"
                                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                                <span class="tooltip-text">Wishlist</span>
                                                                <span class="pro-action-icon"><svg viewBox="0 0 24 24"
                                                                        width="24" height="24" stroke="currentColor"
                                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                                        <path
                                                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                                        </path>
                                                                    </svg></span>
                                                            </a>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                            class="quickview">
                                                            <span class="tooltip-text">View</span>
                                                            <span class="pro-action-icon"><svg viewBox="0 0 24 24"
                                                                    width="24" height="24" stroke="currentColor"
                                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round" class="css-i6dzq1">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg></span>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <form method="POST"
                                                            action="{{ route('frontend.product.cart.add', $product->id) }}">
                                                            @csrf
                                                            <a href="{{ route('frontend.product.cart.add', $product->id) }}"
                                                                class="add-to-cart"
                                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                                <span class="tooltip-text">Add to cart</span>
                                                                <span class="pro-action-icon"><svg viewBox="0 0 24 24"
                                                                        width="24" height="24" stroke="currentColor"
                                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                                        <circle cx="9" cy="21" r="1"></circle>
                                                                        <circle cx="20" cy="21" r="1"></circle>
                                                                        <path
                                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                                        </path>
                                                                    </svg></span>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-buttons" data-animate="animate__fadeInUp">
                            <div class="swiper-buttons-wrap">
                                <button class="swiper-prev swiper-prev-special"><span><svg viewBox="0 0 24 24"
                                            width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg></span></button>
                                <button class="swiper-next swiper-next-special"><span><svg viewBox="0 0 24 24"
                                            width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg></span></button>
                            </div>
                        </div>
                        <div class="swiper-dots" data-animate="animate__fadeInUp">
                            <div class="swiper-pagination swiper-pagination-special"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>