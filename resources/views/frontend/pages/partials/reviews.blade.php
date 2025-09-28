<section class="our-blog section-pt">
    <div class="blog-category">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-capture">
                        <div class="section-title">
                            <div class="section-cont-title">
                                <h2 data-animate="animate__fadeInUp"><span>Reviews</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if ($productReviews->isNotEmpty())
                    @foreach ($productReviews as $review)
                        <div class="col-lg-4">
                            <div class="list-group-item">
                                <div class="row align-items-center mb-3">
                                    <div class="col-3">
                                        <img src="{{ $review->product->image }}" alt="{{ $review->product->name }}"
                                            class="img-fluid rounded">
                                    </div>

                                    <!-- Review Content -->
                                    <div class="col-9">
                                        <!-- Product Info -->
                                        <h6 class="mb-1"><a href="{{ route('frontend.product.show', $review->product->slug) }}">{{ $review->product->name }}</a></h6>
                                        <small class="text-muted">Vendor:
                                            {{ $review->product->seller->name }}</small>

                                        <!-- Reviewer Info -->
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
    </div>
</section>