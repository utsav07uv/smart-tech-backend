@if ($featuredSectionAds)
    <section class="banner-grid section-pt">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="banner-content">
                        <ul class="banner-ul">
                            @foreach ($featuredSectionAds as $ad) 
                                <li class="banner-li">
                                    <div class="banner-wrap banner-hover">
                                        <a href="{{ $ad->url }}">
                                            <img src="{{ $ad->image }}" class="img-fluid" alt="{{ $ad->name }}">
                                        </a>
                                        <div class="banner-wrapper">
                                            <div class="banner-info">
                                                <h6 data-animate="animate__fadeInUp">{{ $ad->name }}</h6>
                                                <div class="banner-title" data-animate="animate__fadeInUp">
                                                    <span>{{ $ad->offer }}</span>
                                                </div>
                                                <div class="banner-link" data-animate="animate__fadeInUp">
                                                    <a href="{{ $ad->url }}" class="banner-btn">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif