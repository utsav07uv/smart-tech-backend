<section class="category-shop section-pt">
    <div class="shop-category">
        <div class="container">
            <div class="row justify-content-center mx-auto">
                <div class="col">
                    <div class="section-capture">
                        <div class="section-title">
                            <h2 data-animate="animate__fadeInUp"><span>Top Sellers</span></h2>
                        </div>
                    </div>
                    <div class="category-wrap mx-auto">
                        <div class="cat-slider swiper" id="category-slider">
                            <div class="swiper-wrapper">
                                @foreach ($sellers as $seller) 
                                    <div class="swiper-slide" data-animate="animate__fadeInUp">
                                        <div class="cat-info">
                                            <div class="cat-img-text">
                                                <a href="{{ route('frontend.product.index', ['vendor' => $seller->name]) }}">
                                                    <img src="{{ $seller->avatar }}" class="img-fluid" alt="{{ $seller->name }}">
                                                    <div class="cat-title">
                                                        <span class="cat-text">{{ $seller->name }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-buttons" data-animate="animate__fadeInUp">
                            <div class="swiper-buttons-wrap">
                                <button class="swiper-prev swiper-prev-category"><span><svg viewBox="0 0 24 24"
                                            width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg></span></button>
                                <button class="swiper-next swiper-next-category"><span><svg viewBox="0 0 24 24"
                                            width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg></span></button>
                            </div>
                        </div>
                        <div class="swiper-dots">
                            <div class="swiper-pagination swiper-pagination-category"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>