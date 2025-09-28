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
                                <span class="breadcrumb-text">Checkout</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="checkout-area">
                        <div class="billing-area">
                            <form method="POST" action="{{ route('payment.store') }}">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="w-100">
                                            <input type="radio" name="method" value="cod"
                                                class="d-none payment-option">
                                            <div class="card text-center p-3 h-100 border option-card">
                                                <img src="{{ asset('smarttech/images/icon/cash-on-delivery.png') }}"
                                                    alt="Cash on Delivery" class="img-fluid mx-auto" style="width: 60px;">
                                                <div class="mt-2 fw-bold">Cash on Delivery</div>
                                            </div>
                                        </label>
                                    </div>

                                    <div class="col-6">
                                        <label class="w-100">
                                            <input type="radio" name="method" value="card"
                                                class="d-none payment-option">
                                            <div class="card text-center p-3 h-100 border option-card">
                                                <img src="{{ asset('smarttech/images/icon/card.png') }}"
                                                    alt="Credit/Debit Card" class="img-fluid mx-auto" style="width: 60px;">
                                                <div class="mt-2 fw-bold">Credit / Debit Card</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="checkout-btn mt-4">
                                    <a href="javascript:void(0)"
                                        onclick="event.preventDefault();this.closest('form').submit();"
                                        class="btn-style2 checkout disabled" data-animate="animate__fadeInUp">Confirm
                                        order</a>
                                </div>
                            </form>
                        </div>
                        <div class="order-area">
                            <h2 data-animate="animate__fadeInUp">Your order</h2>
                            <ul class="order-history">
                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>Order</span>
                                    <span>{{ $order->order_number }}</span>
                                </li>

                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>Placed on</span>
                                    <span>{{ $order->order_at->format('d M Y') }}</span>
                                </li>

                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>Status</span>
                                    <span
                                        class="badge text-white {{ $order->status->bgColor() }}">{{ $order->status->label() }}</span>
                                </li>
                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>Subtotal</span>
                                    <span>{{ $order->subtotal }}</span>
                                </li>
                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>Discount</span>
                                    <span>{{ $order->discount_amount }}</span>
                                </li>
                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>GST (10%)</span>
                                    <span>{{ $order->gst }}</span>
                                </li>
                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>Shipping Charge</span>
                                    <span>{{ $order->shipping_cost }}</span>
                                </li>
                                <li class="order-details" data-animate="animate__fadeInUp">
                                    <span>Total</span>
                                    <span>AUD {{ $order->total }}</span>
                                </li>
                            </ul>
                            <div class="check-pro mt-4">
                                <h2 data-animate="animate__fadeInUp">Order Items</h2>
                                @foreach ($order->orderVendors as $orderVendor)
                                    <div class="card border-1 m-4">
                                        <div class="bg-white border-bottom-0 card-header d-flex justify-content-end">
                                            <p class="mb-0 text-dark fw-bolder">Shipped by: {{ $orderVendor->vendor?->name }}
                                            </p>
                                        </div>
                                        @foreach ($orderVendor->orderItems as $item)
                                            @php
                                                $product = $item->product;
                                            @endphp
                                            <ul class="check-ul border-bottom-0">
                                                <li>
                                                    <div class="check-pro-img">
                                                        <a target="_blank"
                                                            href="{{ route('frontend.product.show', $product->slug) }}"
                                                            data-animate="animate__fadeInUp">
                                                            <img src="{{ $product->image }}" class="img-fluid"
                                                                alt="{{ $product->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="check-content">
                                                        <a target="_blank"
                                                            href="{{ route('frontend.product.show', $product->slug) }}"
                                                            data-animate="animate__fadeInUp">{{ $product->name }}</a>
                                                        <span class="check-code" data-animate="animate__fadeInUp">
                                                            <span>Model:</span>
                                                            <span>{{ $product->model }}</span>
                                                        </span>
                                                        <div class="check-qty-pric" data-animate="animate__fadeInUp">
                                                            <span class="check-qty">{{ $item->quantity }} X</span>
                                                            <span class="check-price">{{ $item->total / $item->quantity }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection