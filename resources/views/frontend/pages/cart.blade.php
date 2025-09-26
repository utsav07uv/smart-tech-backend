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
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cart-page-wrap">
                        <div class="cart-wrap-info">
                            <div class="cart-item-wrap">
                                <div class="cart-title">
                                    <h6 data-animate="animate__fadeInUp">My cart:</h6>
                                    <span class="cart-count" data-animate="animate__fadeInUp">
                                        <span class="cart-counter">{{ $cart->cart_items_count }}</span>
                                        <span class="cart-item-title ms-2">Items</span>
                                    </span>
                                </div>
                                <div class="item-wrap">
                                    @forelse ($cart->cartItems as $item)
                                        @php
                                            $product = $item->product;
                                            $discount = $product->calculateDiscount();
                                            $productStockExists = $product->stock > 0;
                                        @endphp
                                        <ul class="cart-wrap {{ $productStockExists ? '' : 'bg-danger-50' }} px-4">
                                            <li class="item-info">
                                                <div class="me-4">
                                                    <input type="checkbox" class="cart-item-checkbox"
                                                        data-price="{{ ($product->price - $discount) * $item->quantity }}"
                                                        value="{{ $item->id }}" @disabled(!$productStockExists)>
                                                </div>

                                                <div class="item-img">
                                                    <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                        data-animate="animate__fadeInUp">
                                                        <img src="{{ $product->image }}" class="img-fluid"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                </div>

                                                <div class="item-text">
                                                    <a href="{{ route('frontend.product.show', $product->slug) }}"
                                                        data-animate="animate__fadeInUp">{{ $product->name }}</a>
                                                    <span class="item-option" data-animate="animate__fadeInUp">
                                                        <span class="item-title">Color:</span>
                                                        <span class="item-type">{{ $product->color }}</span>
                                                    </span>
                                                    @if ($productStockExists)
                                                        <span class="item-option" data-animate="animate__fadeInUp">
                                                            <span class="item-title">Stock:</span>
                                                            <span class="item-type">{{ $product->stock }}</span>
                                                        </span>
                                                    @else
                                                        <span class="item-option" data-animate="animate__fadeInUp">
                                                            <span class="item-title">Availability:</span>
                                                            <span class="item-type text-danger">Out of stock</span>
                                                        </span>
                                                    @endif
                                                    <span class="item-option" data-animate="animate__fadeInUp">
                                                        <span class="item-title">Vendor:</span>
                                                        <span class="item-type">{{ $product->seller?->name }}</span>
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
                                                    <form method="POST"
                                                        action="{{ route('frontend.product.cart.update', $product->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="product-quantity" data-animate="animate__fadeInUp">
                                                            <div class="cart-plus-minus">
                                                                <button class="dec qtybutton minus"><i
                                                                        class="fa-solid fa-minus"></i></button>
                                                                <input type="text" name="quantity"
                                                                    value="{{ $item->quantity ?? 1 }}">
                                                                <button class="inc qtybutton plus"><i
                                                                        class="fa-solid fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="item-remove">
                                                            <span class="remove-wrap" data-animate="animate__fadeInUp">

                                                                <a href="{{ route('frontend.product.cart.update', $product->id) }}"
                                                                    onclick="event.preventDefault();this.closest('form').submit();"
                                                                    class="text-success"
                                                                    data-animate="animate__fadeInUp">Update</a>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="item-remove">
                                                    <span class="remove-wrap ms-2" data-animate="animate__fadeInUp">
                                                        <form method="POST"
                                                            action="{{ route('frontend.product.cart.destroy', $product->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('frontend.product.cart.destroy', $product->id) }}"
                                                                onclick="event.preventDefault();this.closest('form').submit();"
                                                                class="text-danger" data-animate="animate__fadeInUp">Remove</a>
                                                        </form>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="item-price" data-animate="animate__fadeInUp">
                                                <span class="amount full-price">AUD
                                                    {{ $item->quantity * ($product->price - $discount) }}</span>
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
                                @if ($cart->cartItems->isNotEmpty())
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
                                @if (auth()->user()->addresses->isNotEmpty())
                                    <div class="culculate-shipping" id="shipping-calculator">
                                        <h5 class="mb-3">Select Delivery Address</h5>
                                        <div class="row g-3">
                                            @foreach (auth()->user()->addresses as $address)
                                                <div class="col-12">
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
                                                            {{ $address->state }}, {{ $address->city }},
                                                            {{ $address->postal_code }}
                                                            <br>
                                                            Australia
                                                        </p>
                                                        <p class="mb-0 text-muted">Phone: {{ auth()->user()->phone }}</p>
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

                                                            <form method="POST"
                                                                action="{{ route('address.destroy', $address->id) }}">
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
                                @else
                                    <div class="proceed-to-checkout mt-4 text-center" data-animate="animate__fadeInUp">
                                        <p class="mb-3">No address found.</p>
                                        <a href="{{ route('frontend.address') }}" class="btn btn-style2">Add New</a>
                                    </div>
                                @endif
                            </div>

                            <div class="cart-total-wrap cart-info">
                                <div class="cart-total">
                                    <div class="total-amount">
                                        <h6 class="total-title">Total</h6>
                                        <span class="amount total-price" id="total-price">-</span>
                                    </div>
                                    <div class="proceed-to-checkout">
                                        <form method="POST" action="{{ route('order.store') }}">
                                            @csrf
                                            <input type="hidden" id="cart-item-input" name="cart_item_ids">
                                            <button type="submit" class="btn btn-style2">Proceed to pay</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const checkboxes = document.querySelectorAll('.cart-item-checkbox:not(:disabled)');
                
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function () {
                        const checked = Array.from(checkboxes).filter(cb => cb.checked);
                        const totalPrice = checked.reduce((acc, cb) => {
                            return acc + parseFloat(cb.dataset.price || 0);
                        }, 0);

                        const cartItemIds = checked.map(cb => cb.value);

                        document.getElementById('total-price').innerText = `AUD ${totalPrice}`;
                        document.getElementById('cart-item-input').value = JSON.stringify(cartItemIds);
                        console.log("Total Price:", totalPrice);
                        console.log("Cart Item IDs:", JSON.stringify(cartItemIds));
                    });
                });
            });
        </script>
    @endpush
@endsection