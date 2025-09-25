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
                                <span class="breadcrumb-text">profile</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pro-address-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="password-block">
                        <div class="profile-info">
                            <div class="account-profile">
                                <div class="pro-img">
                                    <a href="javascript:void(0)" data-animate="animate__fadeInUp">
                                        <img src="{{ auth()->user()->avatar }}" class="img-fluid"
                                            alt="{{ auth()->user()->name }}">
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
                                        <a href="order.php">
                                            <span>Orders</span>
                                            <span class="pro-count">5</span>
                                        </a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.profile') }}">Profile</a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="pro-address.html">Address</a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.product.wishlist') }}">
                                            <span>Wishlist</span>
                                            <span class="pro-count">
                                                {{ auth()->user()->wishlist?->wishlistItems()->count() ?? 0 }}

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="profile-form profile-address">
                            <div class="billing-area">
                                <form action="{{ route('frontend.profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="pro-add-title">
                                        <h6 data-animate="animate__fadeInUp">Profile</h6>
                                    </div>
                                    <div class="billing-form">
                                        <ul class="input-2">
                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Name</label>
                                                <input type="text" name="name" placeholder="Full Name"
                                                    value="{{ auth()->user()->name }}" required autofocus>
                                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />

                                            </li>

                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Email address</label>
                                                <input type="email" name="email" placeholder="Email address"
                                                    value="{{ auth()->user()->email }}" required autofocus>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />


                                            </li>
                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Phone number</label>
                                                <input type="tel" name="phone" value="{{ auth()->user()->phone }}"
                                                    placeholder="Phone number" required autofocus>
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />

                                            </li>
                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>New password</label>
                                                <input type="password" name="password" placeholder="New password">
                                                <x-input-error :messages="$errors->get('password')"
                                                    class="mt-2 text-danger" />

                                            </li>
                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Confirm password</label>
                                                <input type="password" name="password_confirmation"
                                                    placeholder="Confirm password">
                                            </li>
                                        </ul>
                                        <ul class="pro-submit">
                                            <li data-animate="animate__fadeInUp">
                                                <button type="submit" class="btn btn-style2">Update
                                                    profile</button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- order info end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection