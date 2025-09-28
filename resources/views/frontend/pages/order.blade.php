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
                                <span class="breadcrumb-text">Order history</span>
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
                                        <a href="{{ route('frontend.order') }}" class="active">
                                            <span>Orders</span>
                                            <span class="pro-count">5</span>
                                        </a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.profile') }}">Profile</a>
                                    </li>
                                    <li class="profile-li" data-animate="animate__fadeInUp">
                                        <a href="{{ route('frontend.address') }}">Address</a>
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

                        <div class="profile-form order-info" data-animate="animate__fadeInUp">
                            <div class="pro-add-title">
                                <h6>Order</h6>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Placed on</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order) 
                                        <tr>
                                            <td><a href="{{ route('frontend.order.view', $order->order_number) }}">{{ $order->order_number }}</a></td>
                                            <td>{{ $order->order_at->format('M d, Y') }}</td>
                                            <td><span class="badge text-white {{ $order->status->bgColor() }}">{{ $order->status->label() }}</span></td>
                                            <td>{{ $order->total }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection