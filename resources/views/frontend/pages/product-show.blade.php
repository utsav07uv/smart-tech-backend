@extends('frontend.layouts.app')
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="breadcrumb-index">
                        <ul class="breadcrumb-ul">
                            <li class="breadcrumb-li">
                                <a class="breadcrumb-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-li">
                                <span class="breadcrumb-text">{{ $product->name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-details-page pro-style4 bg-color section-pt">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pro-details-pos pro-details-left-pos">
                        <div class="product-detail-slider product-details-lr product-details product-details-sticky">
                            <div class="product-detail-img product-detail-img-left">
                                <div class="product-img-top">
                                    <button class="full-view"><i class="bi bi-arrows-fullscreen"></i></button>
                                    <div class="style4-slider-big slick-slider">
                                        @foreach ($product->images as $image) 
                                            <div class="slick-slide">
                                                <a href="{{ $image }}" class="product-single">
                                                    <figure class="zoom" onmousemove="zoom(event)"
                                                        style="background-image: url('{{ $image }}');">
                                                        <img src="{{ $image }}" class="img-fluid" alt="{{ $product->name }}">
                                                    </figure>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="pro-slider">
                                    <div class="style4-slider-small pro-detail-slider">
                                        @foreach ($product->images as $image) 
                                            <div class="slick-slide">
                                                <a href="javascript:void(0)" class="product-single--thumbnail">
                                                    <img src="{{ $image }}" class="img-fluid" alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- peoduct detail start -->
                        <div class="product-details-wrap product-details-lr product-details">
                            <div class="product-details-info">
                                <div class="pro-nprist">
                                    <div class="product-info">
                                        <div class="product-title">
                                            <h2>{{ $product->name }}</h2>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <!-- product-rating start -->
                                        <div class="product-ratting">
                                            <span class="pro-ratting">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </span>
                                            <span class="spr-badge-caption">No reviews</span>
                                        </div>
                                        <!-- product-rating end -->
                                    </div>

                                    @php
                                        $discount = $product->calculateDiscount();
                                    @endphp
                                    <div class="product-info">
                                        <div class="pro-prlb pro-sale">
                                            <div class="price-box">
                                                <span class="new-price">AUD {{ $product->price - $discount }} </span>
                                                @if ($discount > 0) 
                                                    <span class="old-price">AUD {{ $product->price }} </span>
                                                    <span class="percent-count">{{ $product->discount }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-inventory">
                                            <div class="stock-inventory stock-more">
                                                <p class="text-success">Hurry up! only
                                                    <span class="available-stock bg-success">{{ $product->stock }}</span>
                                                    products left in stock!
                                                </p>
                                            </div>
                                            <div class="stock-inventory stock-zero collapse">
                                                <p class="text-danger">Unfortunately
                                                    <span class="available-stock bg-danger">{{ $product->stock }}</span>
                                                    products left in stock!
                                                </p>
                                            </div>
                                            <div class="product-variant">
                                                <h6>Availability:</h6>
                                                <span class="stock-qty in-stock text-success">
                                                    <span>In stock<i class="bi bi-check2"></i></span>
                                                </span>
                                                <span class="stock-qty out-stock text-danger collapse">
                                                    <span>Out of stock</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="pro-detail-action">
                                            <form method="get" class="cart">
                                                <div class="product-variant-option">
                                                    <div class="swatch-variant">
                                                        <div class="swatch clearfix Color">
                                                            <div class="header">
                                                                <h6>
                                                                    <span>Color:</span>
                                                                    <span class="data-value">{{ $product->color }}</span>
                                                                </h6>
                                                            </div>
                                                            <div class="variant-wrap">
                                                                <div class="variant-property">
                                                                    <div class="swatch-element color {{ $product->color }}">
                                                                        <input type="radio" name="option-0" value="{{ $product->color }}"
                                                                            checked>
                                                                        <label>{{ $product->color }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <form method="post" class="cart">
                                            <div class="pro-detail-button">
                                                <div class="product-quantity-button">
                                                    <div class="product-quantity-action">
                                                        <h6>Quantity:</h6>
                                                        <div class="product-quantity">
                                                            <div class="cart-plus-minus">
                                                                <button class="dec qtybutton minus"><i
                                                                        class="feather-minus"></i></button>
                                                                <input type="text" name="quantity" value="1">
                                                                <button class="inc qtybutton plus"><i
                                                                        class="feather-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" onclick="location. href='cart-page.html'"
                                                        class="btn add-to-cart ajax-spin-cart">
                                                        <span class="cart-title">Add to cart</span>
                                                    </button>
                                                </div>
                                                <a href="cart-empty.html" class="btn btn-cart btn-theme">
                                                    <span>Buy now</span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-actions">
                                            <div class="pro-aff-che">
                                                <a href="wishlist-product.html" class="wishlist">
                                                    <span
                                                        class="wishlist-icon action-wishlist tile-actions--btn wishlist-btn">
                                                        <span class="add-wishlist"><i class="bi bi-heart"></i></span>
                                                    </span>
                                                    <span class="wishlist-text">Wishlist</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="form-group">
                                            <a href="#deliver-modal" data-bs-toggle="modal">Delivery &amp; return</a>
                                            <a href="#que-modal" data-bs-toggle="modal">Ask a question</a>
                                        </div>
                                    </div>
                                    <div class="modal fade deliver-modal" id="deliver-modal" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="pop-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="feather-x"></i></button>
                                                    <div class="delivery-block">
                                                        <div class="space-block">
                                                            <h4>Delivery</h4>
                                                            <p>All orders shipped with UPS Express.</p>
                                                            <p>Always free shipping for orders over US $250.</p>
                                                            <p>All orders are shipped with a UPS tracking number.</p>
                                                        </div>
                                                        <div class="space-block">
                                                            <h4>Returns</h4>
                                                            <p>Items returned within 14 days of their original shipment date
                                                                in same as new condition will be eligible for a full refund
                                                                or store credit.</p>
                                                            <p>Refunds will be charged back to the original form of payment
                                                                used for purchase.</p>
                                                            <p>Customer is responsible for shipping charges when making
                                                                returns and shipping/handling fees of original purchase is
                                                                non-refundable.</p>
                                                            <p>All sale items are final purchases.</p>
                                                        </div>
                                                        <div class="space-block">
                                                            <h4>Help</h4>
                                                            <p>Give us a shout if you have any other questions and/or
                                                                concerns.</p>
                                                            <p>Email:<a href="mailto:contact@domain.com">demo@gmail.com</a>
                                                            </p>
                                                            <p>Phone:<a href="tel:+1(23)456789">+1 (23) 456 789</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade que-modal" id="que-modal" aria-modal="true" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="pop-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="feather-x"></i></button>
                                                    <div class="product-form-list">
                                                        <div class="single-product-wrap">
                                                            <div class="product-image">
                                                                <a class="pro-img" href="collection.html">
                                                                    <img class="img-fluid img1 resp-img1"
                                                                        src="img/product/home1-pro-5.jpg" alt="p-1">
                                                                    <img class="img-fluid img2 resp-img2"
                                                                        src="img/product/home1-pro-6.jpg" alt="p-2">
                                                                </a>
                                                            </div>
                                                            <div class="product-content">
                                                                <div class="pro-title-price">
                                                                    <h6><a href="product-details.php">Air conditioner</a>
                                                                    </h6>
                                                                    <div class="product-price">
                                                                        <div class="price-box">
                                                                            <span class="new-price">$61.00</span>
                                                                            <span class="old-price">$54.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ask-form">
                                                        <h6>Ask a question</h6>
                                                        <form method="post" class="contact-form">
                                                            <input type="hidden" name="contact[product url]" value="">
                                                            <div class="form-grp">
                                                                <input type="text" name="contact[name]" required=""
                                                                    placeholder="Your name*">
                                                                <input type="text" name="contact[phone]"
                                                                    placeholder="Your phone number">
                                                                <input type="email" name="contact[email]" required=""
                                                                    placeholder="Your email*">
                                                                <textarea name="contact[question]" rows="4" required=""
                                                                    placeholder="Your message*"></textarea>
                                                                <p>* Required fields</p>
                                                                <button type="submit" class="btn-style2">Submit Now</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <p><span>🚚</span> Item will be delivered on or before <span id="ten-days-ahead">{{ now()->addDays(3)->format('D d m, Y') }}</span></p>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-sku">
                                            <h6>SKU:</h6>
                                            <span class="variant-sku">{{ $product->sku }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="product-info">
                                        <div class="product-payment-image">
                                            <ul class="payment-icon">
                                                <li>
                                                    <a href="index.php"><svg viewBox="0 0 38 24"
                                                            xmlns="http://www.w3.org/2000/svg" role="img" width="38"
                                                            height="24">
                                                            <title id="visa">Visa</title>
                                                            <path opacity=".07"
                                                                d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                                            </path>
                                                            <path fill="#fff"
                                                                d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                                            </path>
                                                            <path
                                                                d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z"
                                                                fill="#142688"></path>
                                                        </svg></a>
                                                </li>
                                                <li>
                                                    <a href="index.php"><svg viewBox="0 0 38 24"
                                                            xmlns="http://www.w3.org/2000/svg" role="img" width="38"
                                                            height="24">
                                                            <title id="master">Mastercard</title>
                                                            <path opacity=".07"
                                                                d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                                                            </path>
                                                            <path fill="#fff"
                                                                d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                                                            </path>
                                                            <circle fill="#EB001B" cx="15" cy="12" r="7"></circle>
                                                            <circle fill="#F79E1B" cx="23" cy="12" r="7"></circle>
                                                            <path fill="#FF5F00"
                                                                d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z">
                                                            </path>
                                                        </svg></a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <section class="product-description-tab">
                                <div class="product-tab" id="collapse-tab">
                                    <div class="tab">
                                        <a href="#collapse-description" class="tab-title collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true">
                                            <h6 class="tab-name">Description</h6>
                                            <span class="tab-icon"><i class="bi bi-plus"></i></span>
                                        </a>
                                        <div class="collapse show" id="collapse-description" data-bs-parent="#collapse-tab">
                                            <div class="product-description">
                                                {!! $product->description !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab">
                                        <a href="#collapse-reviews" class="tab-title collapsed" data-bs-toggle="collapse">
                                            <h6 class="tab-name">Reviews</h6>
                                            <span class="tab-icon"><i class="bi bi-plus"></i></span>
                                        </a>
                                        <div class="collapse" id="collapse-reviews" data-bs-parent="#collapse-tab">
                                            <div id="product-reviews">
                                                <div class="spr-container">
                                                    <div class="spr-header">
                                                        <h2 class="spr-header-title">Customer reviews</h2>
                                                        <div class="spr-summary rte">
                                                            <span class="spr-summary-caption">
                                                                <span class="spr-summary-caption">No reviews yet</span>
                                                            </span>
                                                            <span class="spr-summary-actions">
                                                                <a href="#add-review" data-bs-toggle="collapse"
                                                                    class="spr-summary-actions-newreview">Write a review</a>
                                                            </span>
                                                        </div>
                                                        <!-- product-rating end -->
                                                    </div>
                                                    <div class="spr-content">
                                                        <!-- spar-from start -->
                                                        <div class="spr-form collapse" id="add-review">
                                                            <form method="post" class="new-review-form">
                                                                <h3 class="spr-form-title">Write a review</h3>
                                                                <fieldset class="spr-form-contact">
                                                                    <div class="spr-form-contact-name">
                                                                        <label class="spr-form-label">Name</label>
                                                                        <input type="text" name="q"
                                                                            class="spr-form-input spr-form-input-text "
                                                                            placeholder="Enter your name">
                                                                    </div>
                                                                    <div class="spr-form-contact-email">
                                                                        <label class="spr-form-label">Email address</label>
                                                                        <input type="email" name="q"
                                                                            class="spr-form-input spr-form-input-email"
                                                                            placeholder="john.smith@example.com">
                                                                    </div>
                                                                </fieldset>
                                                                <fieldset class="spr-form-review">
                                                                    <div class="spr-form-review-rating">
                                                                        <label class="spr-form-label">Rating</label>
                                                                        <div class="product-ratting">
                                                                            <span class="pro-ratting">
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star"></i>
                                                                                <i class="fas fa-star-half-alt"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="spr-form-review-title">
                                                                        <label class="spr-form-label">Review title</label>
                                                                        <input type="text" name="q"
                                                                            class="spr-form-input spr-form-input-text "
                                                                            placeholder="Give your review a title">
                                                                    </div>
                                                                    <div class="spr-form-review-body">
                                                                        <label class="spr-form-label">Body of review
                                                                            <span>
                                                                                <span
                                                                                    class="spr-form-review-body-charactersremaining">(1500)</span>
                                                                            </span>
                                                                        </label>
                                                                        <div class="spr-form-input">
                                                                            <textarea
                                                                                class="spr-form-input spr-form-input-textarea"
                                                                                placeholder="Write your comments here"
                                                                                rows="10"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <fieldset class="spr-form-actions">
                                                                    <input type="submit" name="q"
                                                                        class="spr-button spr-button-primary button button-primary btn btn-primary"
                                                                        value="Submit Review">
                                                                </fieldset>
                                                            </form>
                                                        </div>
                                                        <!-- spar-from end -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- peoduct detail end -->
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection