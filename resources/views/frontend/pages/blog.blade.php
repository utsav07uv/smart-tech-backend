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
                                <span class="breadcrumb-text">Blog and Reviews</span>
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
                <div class="col">
                    <div class="blog-grid-wrapper without-wrap">
                        <div class="blog-grid-wrap blog-article">
                            <div class="blog-grid-view">
                                <ul class="blog-area-wrap">
                                    <li class="blog-slider" data-animate="animate__fadeInUp">
                                        <div class="blog-post">
                                            <div class="blog-img">
                                                <a href="blog.php" class="banner-img">
                                                    <img src="{{ asset('smarttech/images/blog/blog1.jpg') }}"
                                                        class="img-fluid" alt="blog1">
                                                    <span class="blog-icon">
                                                        <i class="fas fa-paperclip"></i>
                                                    </span>
                                                    <span class="blog-date-time">
                                                        <span class="blog-date">02</span>
                                                        <span class="blog-month">Jan</span>
                                                        <span class="blog-year">2025</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-tag">
                                                    <h2>How to Choose the Perfect Gadget for Your Lifestyle</h2>
                                                </div>
                                                <p class="blog-title">A practical guide to help buyers pick the
                                                    right tech product—whether for work, study. ...</p>
                                                <a href="blog.php" class="blog-btn">Read more</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="blog-slider" data-animate="animate__fadeInUp">
                                        <div class="blog-post">
                                            <div class="blog-img">
                                                <a href="blog.php" class="banner-img">
                                                    <img src="{{ asset('smarttech/images/blog/blog2.jpg') }}"
                                                        class="img-fluid" alt="blog1">
                                                    <span class="blog-icon">
                                                        <i class="fas fa-paperclip"></i>
                                                    </span>
                                                    <span class="blog-date-time">
                                                        <span class="blog-date">02</span>
                                                        <span class="blog-month">Jan</span>
                                                        <span class="blog-year">2025</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-tag">
                                                    <h2>Top 5 Must-Have Gadgets of 2025</h2>
                                                </div>
                                                <p class="blog-title">Tips and tricks to help customers save money,
                                                    find genuine products. ...</p>
                                                <a href="blog.php" class="blog-btn">Read more</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="blog-slider" data-animate="animate__fadeInUp">
                                        <div class="blog-post">
                                            <div class="blog-img">
                                                <a href="blog.php" class="banner-img">
                                                    <img src="{{ asset('smarttech/images/blog/blog3.jpg') }}"
                                                        class="img-fluid" alt="blog1">
                                                    <span class="blog-icon">
                                                        <i class="fas fa-paperclip"></i>
                                                    </span>
                                                    <span class="blog-date-time">
                                                        <span class="blog-date">02</span>
                                                        <span class="blog-month">Jan</span>
                                                        <span class="blog-year">2025</span>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-tag">
                                                    <h2>The Ultimate Guide to Smart Shopping Online</h2>
                                                </div>
                                                <p class="blog-title">A quick roundup of the latest trending
                                                    electronics and gadgets that are making waves this year. ...</p>
                                                <a href="blog.php" class="blog-btn">Read more</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="paginatoin-area">
                                    <ul class="pagination-page-box" data-animate="animate__fadeInUp">
                                        <li class="number active"><a href="javascript:void(0)" class="theme-glink">1</a>
                                        </li>
                                        <li class="number"><a href="javascript:void(0)" class="gradient-text">2</a>
                                        </li>
                                        <li class="page-next"><a href="javascript:void(0)" class="theme-glink"><i
                                                    class="fa -solid fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection