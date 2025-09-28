@extends('frontend.layouts.app')
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="breadcrumb-index">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-ul">
                            <li class="breadcrumb-li">
                                <a class="breadcrumb-link" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-li">
                                <span class="breadcrumb-text">Vendors</span>
                            </li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-content-wrap bg-color shop-page section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="pro-grli-wrap product-grid">
                        <div class="special-product grid-3">
                            <div class="collection-category">
                                <div class="row">
                                    <div class="col">
                                        <div class="collection-wrap">
                                            <ul class="product-view-ul">
                                                @forelse ($vendors as $vendor)
                                                    <li class="pro-item-li" data-animate="animate__fadeInUp">
                                                        <div class="single-product-wrap">
                                                            <div class="product-image banner-hover">
                                                                <a href="{{ route('frontend.product.index', ['vendor' => $vendor->name]) }}"
                                                                    class="pro-img">
                                                                    <img src="{{ $vendor->avatar }}"
                                                                        class="img-fluid img1 mobile-img1"
                                                                        alt="{{ $vendor->name }}">
                                                                    <img src="{{ $vendor->avatar }}"
                                                                        class="img-fluid img2 mobile-img2"
                                                                        alt="{{ $vendor->name }}">
                                                                </a>
                                                            </div>
                                                            <div class="product-caption">
                                                                <div class="product-content">
                                                                    <div class="product-title">
                                                                        <h3>
                                                                            <a
                                                                                href="{{ route('frontend.product.index', ['vendor' => $vendor->name]) }}">{{ $vendor->name }}</a>
                                                                        </h3>
                                                                        <p>{{ $vendor->phone }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="pro-label-retting">
                                                                    <div class="product-ratting">
                                                                        <span class="pro-ratting">
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                            <i class="fa-solid fa-star"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection