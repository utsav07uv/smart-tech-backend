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
                                <span class="breadcrumb-text">Success</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="drop-detail section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card text-center shadow-sm">
                        <div class="card-body py-5">
                            <div class="mb-4"> <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                            </div>
                            <h2 class="card-title mb-3">Thank You for Your Order!</h2>
                            <p class="text-muted"> Your order has been placed successfully. You will receive an email
                                confirmation shortly. </p>
                            <p class="fw-bold">Order Number: <span class="text-primary">{{ $orderNumber }}</span></p>
                            <div class="d-grid gap-2 mt-4"> <a href="{{ route('home') }}" class="btn btn-primary">Continue
                                    Shopping</a> <a href="{{ route('frontend.order.view', $orderNumber) }}"
                                    class="btn btn-outline-secondary">View My Orders</a> </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection