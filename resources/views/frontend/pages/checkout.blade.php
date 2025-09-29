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

                            <div class="row g-3 m-4">
                                <h5 class="col-12">Available Payment Option</h5>
                                <div class="col-6">
                                    <label class="w-100">
                                        <input type="radio" name="method" value="cod" class="d-none payment-option">
                                        <div class="card text-center p-3 h-100 border option-card">
                                            <img src="{{ asset('smarttech/images/icon/cash-on-delivery.png') }}"
                                                alt="Cash on Delivery" class="img-fluid mx-auto" style="width: 60px;">
                                            <div class="mt-2 fw-bold">Cash on Delivery</div>
                                        </div>
                                    </label>
                                </div>

                                <div class="col-6">
                                    <label class="w-100">
                                        <input type="radio" name="method" value="card" class="d-none payment-option">
                                        <div class="card text-center p-3 h-100 border option-card">
                                            <img src="{{ asset('smarttech/images/icon/card.png') }}" alt="Credit/Debit Card"
                                                class="img-fluid mx-auto" style="width: 60px;">
                                            <div class="mt-2 fw-bold">Credit / Debit Card</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <form id='cod-checkout-form' method="POST" action="{{ route('payment.store') }}" class="d-none">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div class="checkout-btn mt-4">
                                    <p class="mb-3">Pay with cash when your order is delivered. This option lets you check
                                        the product first and pay at your doorstep for a hassle-free shopping experience.
                                    </p>
                                    <a href="javascript:void(0)"
                                        onclick="event.preventDefault();this.closest('form').submit();"
                                        class="btn-style2 checkout disabled" data-animate="animate__fadeInUp">Confirm
                                        order</a>
                                </div>
                            </form>

                            <form id='card-checkout-form' method='post' action="{{ route('stripe.post') }}" class="d-none">
                                @csrf
                                <input type="input" class="form-control" name="name" placeholder="Enter Name">

                                <input type='hidden' name='order_id' id='{{ $order->id }}'>
                                <input type='hidden' name='stripeToken' id='stripe-token-id'>
                                <br>
                                <div id="card-element" class="form-control"></div>
                                <button id='pay-btn' class="btn btn-success mt-3" type="button"
                                    style="margin-top: 20px; width: 100%;padding: 7px;" onclick="createToken()">PAY
                                    AUD {{ $order->total }}
                                </button>
                                <form>
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
    @push('js')
        <script>
            document.body.addEventListener('change', event => {
                if (event.target.classList.contains('payment-option')) {
                    const isCOD = event.target.value === 'cod';

                    document.getElementById('cod-checkout-form')
                        .classList.toggle('d-none', !isCOD);

                    document.getElementById('card-checkout-form')
                        .classList.toggle('d-none', isCOD);
                }
            });
        </script>
        <script src="https://js.stripe.com/v3/"></script>
        <script type="text/javascript">

            var stripe = Stripe('{{ env('STRIPE_KEY') }}')
            var elements = stripe.elements();
            var cardElement = elements.create('card');
            cardElement.mount('#card-element');

            function createToken() {
                document.getElementById("pay-btn").disabled = true;
                stripe.createToken(cardElement).then(function (result) {

                    if (typeof result.error != 'undefined') {
                        document.getElementById("pay-btn").disabled = false;
                        alert(result.error.message);
                    }

                    if (typeof result.token != 'undefined') {
                        document.getElementById("stripe-token-id").value = result.token.id;
                        document.getElementById('checkout-form').submit();
                    }
                });
            }
        </script>
    @endpush
@endsection