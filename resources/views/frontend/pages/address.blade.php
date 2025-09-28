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
                                <span class="breadcrumb-text">Address</span>
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

                                        </a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.profile') }}">Profile</a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.address') }}" class="active">Address</a>
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
                            @if (auth()->user()->addresses->isNotEmpty())
                                <div class="billing-area mb-4">
                                    <h5 class="mb-3">Select Delivery Address</h5>
                                    <div class="row g-3">
                                        @foreach (auth()->user()->addresses as $address)
                                            <div class="col-md-6">
                                                <div class="card border p-3">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <p class="fw-bold">{{ $address->name }}</p>
                                                        @if ($address->is_default)
                                                            <span class="badge bg-success">Default</span>
                                                        @endif
                                                    </div>
                                                    <p class="mb-1 mt-2">
                                                        {{ auth()->user()->name }} <br>
                                                        {{ $address->address_line1 }} <br>
                                                        {{ $address->state }}, {{ $address->city }}, {{ $address->postal_code }}
                                                        <br>
                                                        Australia
                                                    </p>
                                                    <p class="mb-0 text-muted">Email: {{ $address->email }}</p>
                                                    <p class="mb-0 text-muted">Phone: {{ $address->phone }}</p>
                                                    <div class="mt-3 d-flex justify-content-end gap-2">
                                                        @if (!$address->is_default)
                                                            <form method="POST"
                                                                action="{{ route('frontend.address.default', $address->id) }}">
                                                                @csrf
                                                                @method('PUT')

                                                                <button type="submit"
                                                                    onclick="event.preventDefault();this.closest('form').submit();"
                                                                    class="btn btn-sm btn-primary">Make Default</button>
                                                            </form>
                                                        @endif

                                                        <form method="POST" action="{{ route('address.destroy', $address->id) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                onclick="event.preventDefault();this.closest('form').submit();"
                                                                class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="billing-area">
                                <form action="{{ route('address.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <div class="pro-add-title">
                                        <h6 data-animate="animate__fadeInUp">Address</h6>
                                    </div>
                                    <div class="billing-form">
                                        <ul class="input-2">
                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Address label</label>
                                                <input type="text" class="spr-form-input" name="name"
                                                    placeholder="Home Address*" required autofocus>
                                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                            </li>

                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>State</label>
                                                <input type="text" class="spr-form-input" name="state" placeholder="State*"
                                                    required autofocus>
                                                <x-input-error :messages="$errors->get('state')" class="mt-2 text-danger" />
                                            </li>

                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>City</label>
                                                <input type="text" class="spr-form-input" name="city" placeholder="City*"
                                                    required autofocus>
                                                <x-input-error :messages="$errors->get('city')" class="mt-2 text-danger" />

                                            </li>

                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Zip/Postal Code</label>
                                                <input type="text" name="postal_code" class="spr-form-input"
                                                    placeholder="Postal Code*" required autofocus>
                                                <x-input-error :messages="$errors->get('postal_code')"
                                                    class="mt-2 text-danger" />
                                            </li>

                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Email</label>
                                                <input type="email" name="email" class="spr-form-input"
                                                    placeholder="Email Address*" required autofocus>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                            </li>

                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <label>Phone</label>
                                                <input type="tel" name="phone" class="spr-form-input"
                                                    placeholder="Phone Number*" required autofocus>
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />
                                            </li>

                                            <li class="billing-li" data-animate="animate__fadeInUp">
                                                <textarea name="address_line1" class="w-100" placeholder="Address line"
                                                    rows="5"></textarea>
                                                <x-input-error :messages="$errors->get('address_line1')"
                                                    class="mt-2 text-danger" />

                                            </li>

                                        </ul>
                                        <ul class="pro-submit">
                                            <li data-animate="animate__fadeInUp">
                                                <button type="submit" class="btn btn-style2">ADD NEW</button>
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