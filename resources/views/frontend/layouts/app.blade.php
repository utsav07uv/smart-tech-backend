<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="description" content="An Ecommerce platform for Gadgets and Electronics" />
    <meta name="keywords" content="Ecommerce,market,australia,gadgets,electronics,SmartTech,smarttech" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartTech Ecommerce</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">

    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('smarttech/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('smarttech/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/collection.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/blog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/other-pages.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/product-page.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/style8.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('smarttech/css/custom.css')}}">
</head>

<body>
    @include('frontend.pages.partials.notification-bar')
    @include('frontend.pages.partials.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('frontend.pages.partials.footer')
    y
    <div class="search-modal modal fade" id="searchmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="search-content">
                                    <div class="search-box">
                                        <button type="button" class="search-close" data-bs-dismiss="modal"><span><svg
                                                    viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" class="css-i6dzq1">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg></span></button>
                                        <form action="index.php" method="get" class="search-bar">
                                            <div class="form-search">
                                                <input type="search" name="q" placeholder="Search here"
                                                    onclick="location.href='search.html'" class="search-input">
                                                <button type="submit" class="search-btn"><span><svg viewBox="0 0 24 24"
                                                            width="16" height="16" stroke="currentColor"
                                                            stroke-width="2" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round" class="css-i6dzq1">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-screen"></div>

    <div class="bottom-menu">
        <ul class="bottom-menu-element">
            <li class="bottom-menu-wrap">
                <div class="bottom-menu-wrapper">
                    <a href="index.php" class="bottom-menu-home">
                        <span class="bottom-menu-icon"><svg viewBox="0 0 24 24" width="24" height="24"
                                stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></span>
                        <span class="bottom-menu-title">Home</span>
                    </a>
                </div>
            </li>
            <li class="bottom-menu-wrap">
                <div class="bottom-menu-wrapper">
                    <a href="login.php" class="bottom-menu-user">
                        <span class="bottom-menu-icon"><svg viewBox="0 0 24 24" width="24" height="24"
                                stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="css-i6dzq1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg></span>
                        <span class="bottom-menu-title">Account</span>
                    </a>
                </div>
            </li>
            <li class="bottom-menu-wrap">
                <div class="bottom-menu-wrapper">
                    <a href="collection.html" class="bottom-menu-collection">
                        <span class="bottom-menu-icon"><svg viewBox="0 0 24 24" width="24" height="24"
                                stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="css-i6dzq1">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg></span>
                        <span class="bottom-menu-title">Shop</span>
                    </a>
                </div>
            </li>
            <li class="bottom-menu-wrap">
                <div class="bottom-menu-wrapper">
                    <a href="#searchmodal" data-bs-toggle="modal" class="bottom-menu-search">
                        <span class="bottom-menu-icon"><svg viewBox="0 0 24 24" width="24" height="24"
                                stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="css-i6dzq1">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg></span>
                        <span class="bottom-menu-title">search</span>
                    </a>
                </div>
            </li>
            <li class="bottom-menu-wrap">
                <div class="bottom-menu-wrapper">
                    <a href="wishlist-product.html" class="bottom-menu-wishlist">
                        <span class="bottom-menu-icon-wrap">
                            <span class="bottom-menu-icon"><svg viewBox="0 0 24 24" width="24" height="24"
                                    stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" class="css-i6dzq1">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg></span>
                            <span class="bottom-menu-counter wishlist-counter">0</span>
                        </span>
                        <span class="bottom-menu-title">Wishlist</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <script src="{{ asset('smarttech/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/popper.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/slick.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('smarttech/js/counter.js') }}"></script>
    <script src="{{ asset('smarttech/js/typewriter.js') }}"></script>
    <script src="{{ asset('smarttech/js/main.js') }}"></script>
</body>

</html>