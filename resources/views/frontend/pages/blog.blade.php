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
                                <span class="breadcrumb-text">Reviews</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="article-area section-ptb">
        <div class="container">
            <div class="row">
                @if ($productReviews->isNotEmpty())
                    @foreach ($productReviews as $review)
                        <div class="col-12 col-md-6 mb-3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <img src="{{ $review->product->image }}" alt="{{ $review->product->name }}"
                                            class="img-fluid rounded">
                                    </div>

                                    <div class="col-9">
                                        <h6 class="mb-1"><a
                                                href="{{ route('frontend.product.show', $review->product->slug) }}">{{ $review->product->name }}</a>
                                        </h6>
                                        <small class="text-muted">Vendor:
                                            {{ $review->product->seller->name }}</small>

                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <span><strong>{{ $review->user->name }}</strong></span>
                                            <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                                        </div>

                                        <div class="text-warning mb-2">
                                            @for ($i = 0; $i < $review->rating; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor

                                        </div>

                                        <p class="mb-1">{{ $review->comment }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection