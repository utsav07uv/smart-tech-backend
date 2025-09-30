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
                                <span class="breadcrumb-text">My Wishlist</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="order-histry-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="password-block">
                        <div class="profile-info">
                            <div class="account-profile">
                                <div class="pro-img">
                                    <a href="javascript:void(0)" data-animate="animate__fadeInUp">
                                        <img src="{{ asset('smarttech/images/profile.png') }}" class="img-fluid"
                                            alt="testi-1">
                                    </a>
                                </div>
                                <div class="profile-text">
                                    <h6 data-animate="animate__fadeInUp">{{ auth()->user()->name }}</h6>
                                    <span data-animate="animate__fadeInUp">Joined
                                        {{ auth()->user()->created_at->format('Y m, d D') }}</span>
                                </div>
                            </div>
                            <div class="account-detail">
                                <ul class="profile-ul">
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.order') }}">
                                            <span>Orders</span>

                                        </a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.profile') }}">Profile</a>
                                    </li>

                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.address') }}">Address</a>
                                    </li>

                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.product.wishlist') }}" class="active">
                                            <span>Wishlist</span>
                                            <span class="pro-count">
                                                {{ auth()->user()->wishlist?->wishlistItems()->count() ?? 0 }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="profile-form order-info">
                            <div class="pro-add-title">
                                <h6 data-animate="animate__fadeInUp">Wishlist</h6>
                            </div>

                            @if ($wishlistItems->isEmpty())
                                <div class="drawer-cart-empty my-5 text-center">
                                    <div class="drawer-scrollable">
                                        <h2>Your wishlist is currently empty</h2>
                                        <a href="{{ route('home') }}" class="btn btn-style2 mt-4">Continue shopping</a>
                                    </div>
                                </div>
                            @else
                                <div class="wishlist-area">
                                    <div class="wishlist-details">
                                        <div class="wishlist-item" data-animate="animate__fadeInUp">
                                            <span class="wishlist-head">My wishlist:</span>
                                            <span
                                                class="sp-link-title">{{ auth()->user()->wishlist?->wishlistItems()->count() ?? 0 }}
                                                item</span>
                                        </div>
                                        @foreach ($wishlistItems as $item)
                                            @php
                                                $product = $item->product;
                                                $discount = $product->calculateDiscount();
                                            @endphp
                                            <div class="wishlist-all-pro">
                                                <div class="wishlist-pro">
                                                    <div class="wishlist-pro-image">
                                                        <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                            data-animate="animate__fadeInUp">
                                                            <img src="{{ $product->image }}" class="img-fluid"
                                                                alt="{{ $product->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="pro-details">
                                                        <h6>
                                                            <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                                data-animate="animate__fadeInUp">{{ $product->name }}</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="qty-item">

                                                    <form method="POST"
                                                        action="{{ route('frontend.product.cart.add', $product->id) }}">
                                                        @csrf
                                                        <a href="{{ route('frontend.product.cart.add', $product->id) }}"
                                                            onclick="event.preventDefault();this.closest('form').submit();"
                                                            class="add-wishlist" data-animate="animate__fadeInUp">Add to cart</a>
                                                    </form>

                                                    <form method="POST" action="{{ route('order.buy') }}">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <a href="{{ route('order.buy') }}"
                                                            onclick="event.preventDefault();this.closest('form').submit();"
                                                            class="add-wishlist" data-animate="animate__fadeInUp">Buy now</a>
                                                    </form>

                                                    <form method="POST"
                                                        action="{{ route('frontend.product.wishlist.destroy', $product->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('frontend.product.wishlist.destroy', $product->id) }}"
                                                            onclick="event.preventDefault();this.closest('form').submit();"
                                                            class="add-wishlist" data-animate="animate__fadeInUp">Remove</a>
                                                    </form>
                                                </div>

                                                <div class="all-pro-price">
                                                    <div class="price-box" data-animate="animate__fadeInUp">
                                                        <span class="new-price me-2">AUD
                                                            {{ $product->price - $product->discount }}</span>
                                                        @if ($discount > 0)
                                                            <del class="old-price">AUD {{ $product->price }}</del>
                                                        @endif
                                                    </div>
                                                    <span class="wishalist-icon" data-animate="animate__fadeInUp"><i
                                                            class="fa fa-heart text-danger"></i></span>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="other-link">
                                            <ul class="other-ul">
                                                <li class="wishlist-other-link" data-animate="animate__fadeInUp">
                                                    <a href="{{ route('home') }}" class="btn btn-style2">Continue shopping</a>
                                                </li>
                                                <li class="wishlist-other-link" data-animate="animate__fadeInUp">
                                                    <form method="POST" action="{{ route('frontend.wishlist.clear') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('frontend.wishlist.clear') }}"
                                                            onclick="event.preventDefault();this.closest('form').submit();"
                                                            class="btn btn-style2">Clear wishlist</a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection