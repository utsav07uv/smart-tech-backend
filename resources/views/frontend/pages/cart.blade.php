@extends('frontend.layouts.app')
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="breadcrumb-index">
                        <ul class="breadcrumb-ul">
                            <li class="breadcrumb-li">
                                <a class="breadcrumb-link" href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-li">
                                <span class="breadcrumb-text">Your shopping cart</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cart-page section-ptb">
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="cart-page-wrap">
                            <div class="cart-wrap-info">
                                <div class="cart-item-wrap">
                                    <div class="cart-title">
                                        <h6 data-animate="animate__fadeInUp">My cart:</h6>
                                        <span class="cart-count" data-animate="animate__fadeInUp">
                                            <span
                                                class="cart-counter">{{ auth()->user()->cart?->cartItems()->count() ?? 0 }}</span>
                                            <span class="cart-item-title ms-2">Items</span>
                                        </span>
                                    </div>
                                    <div class="item-wrap">
                                        @forelse ($cartItems as $item)
                                            @php
                                                $product = $item->product;
                                                $discount = $product->calculateDiscount();
                                            @endphp
                                            <ul class="cart-wrap">
                                                <li class="item-info">
                                                    <div class="item-img">
                                                        <a href="product-details.php" data-animate="animate__fadeInUp">
                                                            <img src="{{ $product->image }}" class="img-fluid"
                                                                alt="{{ $product->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="item-text">
                                                        <a href="product-details.php"
                                                            data-animate="animate__fadeInUp">{{ $product->name }}</a>
                                                        <span class="item-option" data-animate="animate__fadeInUp">
                                                            <span class="item-title">Color:</span>
                                                            <span class="item-type">{{ $product->color }}</span>
                                                        </span>
                                                        <span class="item-option" data-animate="animate__fadeInUp">
                                                            <span class="item-price">AUD
                                                                {{ $product->price - $product->calculateDiscount() }}</span><span
                                                                class="ms-2">after {{ $product->discount }} % off</span>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="item-qty">
                                                    <div class="product-quantity-action">
                                                        <div class="product-quantity" data-animate="animate__fadeInUp">
                                                            <div class="cart-plus-minus">
                                                                <button class="dec qtybutton minus"><i
                                                                        class="fa-solid fa-minus"></i></button>
                                                                <input type="text" name="quantity"
                                                                    value="{{ $item->quantity }}">
                                                                <button class="inc qtybutton plus"><i
                                                                        class="fa-solid fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-remove">
                                                        <span class="remove-wrap" data-animate="animate__fadeInUp">
                                                            <form method="POST"
                                                                action="{{ route('frontend.product.cart.destroy', $product->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="{{ route('frontend.product.cart.destroy', $product->id) }}"
                                                                    onclick="event.preventDefault();this.closest('form').submit();"
                                                                    class="text-danger"
                                                                    data-animate="animate__fadeInUp">Remove</a>
                                                            </form>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="item-price" data-animate="animate__fadeInUp">
                                                    <span class="amount full-price">AUD {{ $product->price - $discount }}</span>
                                                </li>
                                            </ul>
                                        @empty
                                            <div class="drawer-cart-empty my-5 text-center">
                                                <div class="drawer-scrollable">
                                                    <h2>Your cart is currently empty</h2>
                                                    <a href="{{ route('home') }}" class="btn btn-style2 mt-4">Continue
                                                        shopping</a>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    @if ($cartItems->isNotEmpty())
                                        <div class="cart-buttons" data-animate="animate__fadeInUp">
                                            <a href="{{ route('home') }}" class="btn-style2">Continue shopping</a>
                                            <form method="POST" action="{{ route('frontend.cart.clear') }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('frontend.cart.clear') }}"
                                                    onclick="event.preventDefault();this.closest('form').submit();"
                                                    class="btn btn-style2">Clear cart</a>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <div class="special-notes">
                                    <label data-animate="animate__fadeInUp">Shopping Information</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <h6 class="fw-bold"><i class="bi bi-truck me-2 text-primary"></i>
                                                    Delivery Information</h6>
                                                <ol class="mb-0">
                                                    <li>Standard delivery: 2–5 business days after dispatch.</li>
                                                    <li>Express delivery (if available): 1–2 business days.</li>
                                                    <li>Delivery charges may vary by location and product
                                                        size/weight.</li>
                                                    <li>Tracking details will be shared after shipment.</li>
                                                </ol>
                                            </div>

                                            <div class="mb-3">
                                                <h6 class="fw-bold"><i
                                                        class="bi bi-arrow-counterclockwise me-2 text-success"></i>
                                                    Return & Exchange Policy</h6>
                                                <ol class="mb-0">
                                                    <li>Returns/exchanges within <strong>7 days</strong> of
                                                        delivery.</li>
                                                    <li>Item must be unused, in original packaging, with all tags.
                                                    </li>
                                                    <li>Refunds processed after inspection of returned product.</li>
                                                    <li>Some items (perishable/hygiene) are non-returnable.</li>
                                                </ol>
                                            </div>

                                            <div>
                                                <h6 class="fw-bold"><i class="bi bi-bag-check me-2 text-warning"></i>
                                                    Buying &
                                                    Checkout</h6>
                                                <ol class="mb-0">
                                                    <li>Review your cart items before checkout.</li>
                                                    <li>Update quantity or remove products anytime.</li>
                                                    <li>Apply discounts or promo codes at checkout.</li>
                                                    <li>Secure payment options: Card, Wallet, COD (if available).
                                                    </li>
                                                </ol>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="cart-info-wrap">
                                <div class="cart-calculator cart-info">
                                    <h6 data-animate="animate__fadeInUp">Shipping info</h6>
                                    <div class="culculate-shipping" id="shipping-calculator">
                                        <ul>
                                            <li class="field" data-animate="animate__fadeInUp">
                                                <label>Country</label>
                                                <select>
                                                    <option>Australia</option>
                                                    <option>UK</option>
                                                    <option>Austria </option>
                                                    <option>Belgium</option>
                                                    <option>Singapoure</option>
                                                    <option>Canada</option>
                                                    <option>France</option>
                                                    <option>Germany</option>
                                                    <option>Phillipines</option>
                                                    <option>Nepal</option>
                                                </select>
                                            </li>
                                            <li class="field" data-animate="animate__fadeInUp">
                                                <label>State</label>
                                                <select>
                                                    <option>NSW</option>
                                                    <option>QLD</option>
                                                    <option>VIC</option>
                                                    <option>WA</option>
                                                    <option>SA</option>
                                                </select>
                                            </li>
                                            <li class="field cpn-code" data-animate="animate__fadeInUp">
                                                <label>Postal/Zip Codes</label>
                                                <input type="text" name="q" placeholder="Zip/Postal Code">
                                            </li>
                                        </ul>
                                        <div class="shipping-info" data-animate="animate__fadeInUp">
                                            <a href="javascript:void(0)" class="btn btn-style2">Calculate</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-total-wrap cart-info">
                                    <div class="cart-total">
                                        <div class="total-amount" data-animate="animate__fadeInUp">
                                            <h6 class="total-title">Total</h6>
                                            <span class="amount total-price">$56.00</span>
                                        </div>
                                        <div class="proceed-to-discount" data-animate="animate__fadeInUp">
                                            <input type="text" name="discount" placeholder="Discount code">
                                        </div>
                                        <div class="proceed-to-checkout" data-animate="animate__fadeInUp">
                                            <a href="checkout.php" class="btn btn-style2">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection