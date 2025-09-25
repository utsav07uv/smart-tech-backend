@if ($footerAd) 
    <section class="custom-banner section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="custom-block">
                        <div class="custom-wrap banner-hover">
                            <a href="{{ $ad->url }}" class="big-banner">
                                <img src="{{ $footerAd->image }}" class="img-fluid desk-img" alt="{{ $ad->name }}">
                                <img src="{{ $footerAd->image }}" class="img-fluid mobile-img" alt="{{ $ad->name }}">
                                <div class="custom-info">
                                    <div class="custom-text">
                                        <h2 data-animate="animate__fadeInUp">{{ $ad->name }}</h2>
                                        <span data-animate="animate__fadeInUp">{{ $ad->description }}</span>
                                        <div data-animate="animate__fadeInUp" class="custom-link">
                                            <span>Shop now</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif