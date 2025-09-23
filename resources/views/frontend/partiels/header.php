 <!-- header start -->
        <header class="main-header" id="main-header">
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header-area">
                                <div class="header-element toggler-wrap">
                                    <div class="toggler-wrapper">
                                        <button class="toggler-btn">
                                        <span class="toggler-icon"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="header-element header-logo">
                                    <div class="header-theme-logo">
                                        <a href="index.php" class="theme-logo">
                                            <img src="images/logo.png" class="img-fluid" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="header-element header-search">
                                    <div class="side-wrap search-wrap">
                                        <div class="search-crap">
                                            <div class="search-content">
                                                <div class="search-box">
                                                    <form action="" method="get" class="search-bar">
                                                        <div class="form-search">
                                                            <input type="search" name="q" placeholder="Search our catalog" class="search-input">
                                                            <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-element header-icon">
                                    <div class="header-icon-block">
                                        <ul class="shop-element">
                                            <li class="side-wrap wishlist-wrap">
                                                <div class="wishlist-wrapper">
                                                    <a href="wishlist.php">
                                                        <span class="wishlist-icon-count">
                                                            <span class="wishlist-icon"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></span>
                                                            <span class="wishlist-count">3</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="side-wrap cart-wrap">
                                                <div class="cart-wrapper">
                                                    <a href="cart.php">
                                                        <span class="cart-icon-count">
                                                            <span class="cart-icon"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg></span>
                                                            <span class="cart-count">4</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-bottam start -->
            <div class="header-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="side-wrap search-wrap">
                                <div class="search-crap">
                                    <div class="search-content">
                                        <div class="search-box">
                                            <form action="index.php" method="get" class="search-bar">
                                                <div class="form-search">
                                                    <input type="search" name="q" placeholder="Search our catalog" class="search-input">
                                                    <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-menu-area bt">
                                <div class="main-block">
                                    <nav class="main-navigation navbar-expand-xl">
                                        <div class="menu-close">
                                            <button class="menu-close-btn">
                                            <span class="menu-close-icon"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                                            </button>
                                        </div>
                                        <div class="navbar-collapse" id="navbarContent">
                                            <!-- categor-menu start -->
                                            <div class="categor-menu">
                                                <a href="#categor-collapse" class="cate-info <?php echo $category_collaps === true ? '' : 'collapsed' ?> " data-bs-toggle="collapse" aria-expanded="true">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                                <span>Top Categories</span></a>
                                                <div class="catwrap collapse <?php echo $category_collaps === true ? 'show' : '' ?>" id="categor-collapse">
                                                    <ul class="main-menu">
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/computer.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Computer</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/computer.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Computer</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/smartphone.png" class="img-fluid" alt="Smartphone">
                                                                <span class="sp-link-title">Smartphone</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/smartphone.png" class="img-fluid" alt="Smartphone">
                                                                <span class="sp-link-title">Smartphone</span>
                                                            </a>
                                                        </li>
                                                         <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/camera.png" class="img-fluid" alt="Camera">
                                                                <span class="sp-link-title">Camera</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/camera.png" class="img-fluid" alt="Camera">
                                                                <span class="sp-link-title">Camera</span>
                                                            </a>
                                                        </li>
                                                         <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/headphones.png" class="img-fluid" alt="Headphone">
                                                                <span class="sp-link-title">Headphone</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/headphones.png" class="img-fluid" alt="Headphone">
                                                                <span class="sp-link-title">Headphone</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/laptop.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Laptop</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/laptop.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Laptop</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/speaker.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Speakers</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/speaker.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Speakers</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/homeapp.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Home appliance</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/homeapp.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Home appliance</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/smart-tv.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Smart TV</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/smart-tv.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Smart TV</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/ssd.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Storage devices</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/ssd.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Storage devices</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-link">
                                                            <a href="javascript:void(0)" class="link-title">
                                                                <img src="images/category/gamingass.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Gaming accessories</span>
                                                            </a>
                                                            <a href="javascript:void(0)" class="link-title link-title-lg">
                                                                <img src="images/category/gamingass.png" class="img-fluid" alt="Computer">
                                                                <span class="sp-link-title">Gaming accessories</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- categor-menu end -->
                                            <!-- header-menu start -->
                                            <div class="header-menu">
                                                <a href="#main-collapse" class="header-info collapsed" data-bs-toggle="collapse" aria-expanded="false">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                                <span>Menu</span></a>
                                                <div class="mainmenu-content collapse" id="main-collapse">
                                                    <div class="main-wrap">
                                                        <ul class="main-menu">
                                                            <li class="menu-link">
                                                                <a href="index.php" class="link-title">
                                                                    <span class="sp-link-title">Home</span>                                                                </a>
                                                            </li>
                                                                                                                        <li class="menu-link">
                                                                <a href="vendor.php" class="link-title">
                                                                    <span class="sp-link-title">Vendor</span>                                                                </a>
                                                            </li>
                                                            <li class="menu-link">
                                                                <a href="blog.php" class="link-title">
                                                                    <span class="sp-link-title">Blog and Reviews</span>
                                                                </a>
                                                            </li>
                                                             <li class="menu-link">
                                                                <a href="profile.php" class="link-title">
                                                                    <span class="sp-link-title">My Profile</span>
                                                                </a>
                                                            </li>
                                                             <li class="menu-link">
                                                                <a href="support.php" class="link-title">
                                                                    <span class="sp-link-title">Support</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- header-menu end -->
                                            <!-- offer-content start -->
                                            <div class="offer-content">
                                                <ul class="offer-ul">
                                                    <li class="offer-li">
                                                        <p class="off-text">Flat 30% off</p>
                                                        <p class="off-text">Black friday sale</p>
                                                        <p class="off-text">Get upto 50% off</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- offer-content end -->
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->