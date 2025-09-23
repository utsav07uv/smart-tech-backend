<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="description"
        content="An Ecommerce platform for Gadgets and Electronics" />
    <meta name="keywords"
        content="Ecommerce,market,australia,gadgets,electronics,SmartTech,smarttech" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
    <title>SmartTech-Ecom</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-icons.css">
    <!-- magnific-popup css -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <!--fether css -->
    <link rel="stylesheet" type="text/css" href="css/feather.css">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <!-- owl-carousel css -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="css/swiper-bundle.min.css">
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- collection css -->
    <link rel="stylesheet" type="text/css" href="css/collection.css">
    <!-- blog css -->
    <link rel="stylesheet" type="text/css" href="css/blog.css">
    <!-- other-pages css -->
    <link rel="stylesheet" type="text/css" href="css/other-pages.css">
    <!-- product-page css -->
    <link rel="stylesheet" type="text/css" href="css/product-page.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style8.css">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
    <?php include("partiels/notification-bar.php"); ?>
    <?php $category_collaps = false;
    include("partiels/header.php"); ?>
        <!-- main section start-->
        <main>
            <!-- breadcrumb start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="col">
                        <div class="row">
                            <div class="breadcrumb-index">
                                <!-- breadcrumb-list start -->
                                <ul class="breadcrumb-ul">
                                    <li class="breadcrumb-li">
                                        <a class="breadcrumb-link" href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-li">
                                        <span class="breadcrumb-text">Checkout</span>
                                    </li>
                                </ul>
                                <!-- breadcrumb-list end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->
            <!-- checkout-area start -->
            <section class="section-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="checkout-area">
                                <div class="billing-area">
                                    <form>
                                        <h2 data-animate="animate__fadeInUp">Billing details</h2>
                                        <div class="billing-form">
                                            <ul class="input-2" data-animate="animate__fadeInUp">
                                                <li class="billing-li">
                                                    <label>First name</label>
                                                    <input type="text" name="f-name" placeholder="First name">
                                                </li>
                                                <li class="billing-li">
                                                    <label>Last name</label>
                                                    <input type="text" name="l-name" placeholder="Last name">
                                                </li>
                                            </ul>
                                            <ul class="billing-ul">
                                                <li class="billing-li" data-animate="animate__fadeInUp">
                                                    <label>Company name (Optional)</label>
                                                    <input type="text" name="company details" placeholder="Company name">
                                                </li>
                                                <li class="billing-li" data-animate="animate__fadeInUp">
                                                    <label>Country</label>
                                                    <select>
                                                        <option>Select a country</option>
                                                        <option>United country</option>
                                                        <option>Russia</option>
                                                        <option>italy</option>
                                                        <option>France</option>
                                                        <option>Ukraine</option>
                                                        <option>Germany</option>
                                                        <option>india</option>
                                                        <option>Australia</option>
                                                        <option>canada</option>
                                                    </select>
                                                </li>
                                                <li class="billing-li" data-animate="animate__fadeInUp">
                                                    <label>Street address</label>
                                                    <input type="text" name="address" placeholder="Street address">
                                                </li>
                                                <li class="billing-li" data-animate="animate__fadeInUp">
                                                    <label>Apartment,suite,unit etc. (Optional)</label>
                                                    <input type="text" name="--">
                                                </li>
                                                <li class="billing-li" data-animate="animate__fadeInUp">
                                                    <label>Town / City</label>
                                                    <input type="text" name="city">
                                                </li>
                                                <li class="billing-li" data-animate="animate__fadeInUp">
                                                    <label>State / Country</label>
                                                    <input type="text" name="--">
                                                </li>
                                                <li class="billing-li" data-animate="animate__fadeInUp">
                                                    <label>Postcode / Zip</label>
                                                    <input type="text" name="--">
                                                </li>
                                            </ul>
                                            <ul class="input-2" data-animate="animate__fadeInUp">
                                                <li class="billing-li">
                                                    <label>Email address</label>
                                                    <input type="text" name="mail" placeholder="Email address">
                                                </li>
                                                <li class="billing-li">
                                                    <label>Phone number</label>
                                                    <input type="text" name="phone" placeholder="Phone number">
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                    <div class="billing-details">
                                        <form>
                                            <h2 data-animate="animate__fadeInUp">Shipping details</h2>
                                            <ul class="shipping-form pro-submit">
                                                <li class="check-box label-info">
                                                    <label class="box-area" data-animate="animate__fadeInUp">
                                                        <span class="text">Ship to a different address?</span>
                                                        <input type="checkbox" class="cust-checkbox">
                                                        <span class="cust-check"></span>
                                                    </label>
                                                </li>
                                                <li class="comment-area">
                                                    <label data-animate="animate__fadeInUp">Order notes(Optional)</label>
                                                    <textarea name="comments" rows="5" cols="80"></textarea>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <div class="order-area">
                                    <div class="check-pro">
                                        <h2 data-animate="animate__fadeInUp">In your cart (2)</h2>
                                        <ul class="check-ul">
                                            <li>
                                                <div class="check-pro-img">
                                                    <a href="product-details.php" data-animate="animate__fadeInUp">
                                                        <img src="img/menu/home-pro-banner1.jpg" class="img-fluid" alt="p-1">
                                                    </a>
                                                </div>
                                                <div class="check-content">
                                                    <a href="product-details.php" data-animate="animate__fadeInUp">Verse earphones</a>
                                                    <span class="check-code" data-animate="animate__fadeInUp">
                                                        <span>Product code:</span>
                                                        <span>CA70051541B</span>
                                                    </span>
                                                    <div class="check-qty-pric" data-animate="animate__fadeInUp">
                                                        <span class="check-qty">4 X</span>
                                                        <span class="check-price">$11,00</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="check-pro-img">
                                                    <a href="product-details.php" data-animate="animate__fadeInUp">
                                                        <img src="img/menu/home-pro-banner2.jpg" class="img-fluid" alt="p-2">
                                                    </a>
                                                </div>
                                                <div class="check-content">
                                                    <a href="product-details.php" data-animate="animate__fadeInUp">Bluetooth earbuds</a>
                                                    <span class="check-code" data-animate="animate__fadeInUp">
                                                        <span>Product code:</span>
                                                        <span>CA70051541B</span>
                                                    </span>
                                                    <div class="check-qty-pric" data-animate="animate__fadeInUp">
                                                        <span class="check-qty">4 X</span>
                                                        <span class="check-price">$21,00</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <h2 data-animate="animate__fadeInUp">Your order</h2>
                                    <ul class="order-history">
                                        <li class="order-details" data-animate="animate__fadeInUp">
                                            <span>Product:</span>
                                            <span>Total</span>
                                        </li>
                                        <li class="order-details" data-animate="animate__fadeInUp">
                                            <span>Candy nut chocolate</span>
                                            <span>$44,00</span>
                                        </li>
                                        <li class="order-details" data-animate="animate__fadeInUp">
                                            <span>A bekery doughnutss</span>
                                            <span>$84,00</span>
                                        </li>
                                        <li class="order-details" data-animate="animate__fadeInUp">
                                            <span>Subtotal</span>
                                            <span>$128,00</span>
                                        </li>
                                        <li class="order-details" data-animate="animate__fadeInUp">
                                            <span>Shipping Charge</span>
                                            <span>Free shipping</span>
                                        </li>
                                        <li class="order-details" data-animate="animate__fadeInUp">
                                            <span>Total</span>
                                            <span>$128,00</span>
                                        </li>
                                    </ul>
                                    <form>
                                        <ul class="order-form pro-submit">
                                            <li class="label-info" data-animate="animate__fadeInUp">
                                                <label class="box-area">
                                                    <span class="text">Direct bank transfer</span>
                                                    <input type="checkbox" class="cust-checkbox">
                                                    <span class="cust-check"></span>
                                                </label>
                                            </li>
                                            <li class="label-info" data-animate="animate__fadeInUp">
                                                <label class="box-area">
                                                    <span class="text">Paypal</span>
                                                    <input type="checkbox" class="cust-checkbox">
                                                    <span class="cust-check"></span>
                                                </label>
                                            </li>
                                            <li class="label-info" data-animate="animate__fadeInUp">
                                                <label class="box-area">
                                                    <span class="text">Cash on hand</span>
                                                    <input type="checkbox" class="cust-checkbox">
                                                    <span class="cust-check"></span>
                                                </label>
                                            </li>
                                            <li class="pay-icon" data-animate="animate__fadeInUp">
                                                <a href="javascript:void(0)"><i class="fa-solid fa-credit-card"></i></a>
                                                <a href="javascript:void(0)"><i class="fa-brands fa-cc-visa"></i></a>
                                                <a href="javascript:void(0)"><i class="fa-brands fa-cc-paypal"></i></a>
                                                <a href="javascript:void(0)"><i class="fa-brands fa-cc-mastercard"></i></a>
                                            </li>
                                        </ul>
                                    </form>
                                    <div class="checkout-btn">
                                        <a href="order-complete.html" class="btn-style2 checkout disabled" data-animate="animate__fadeInUp">Place order</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- checkout-area end -->
        </main>
        <!-- main section end-->
    <?php include("partiels/footer.php"); ?>
    <!-- search-modal start -->
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
    <!-- search-modal end -->
    <!-- cart-drawer start -->
    <div class="cart-drawer" id="cart-drawer">
        <form action="javascript:void(0)" method="post" class="drawer-contents">
            <div class="drawer-fixed-header">
                <div class="drawer-header">
                    <h6 class="drawer-header-title">Cart</h6>
                    <div class="drawer-close">
                        <button type="button" class="drawer-close-btn"><span class="drawer-close-icon"><svg
                                    viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg></span></button>
                    </div>
                </div>
            </div>
            <div class="drawer-cart-empty">
                <div class="drawer-scrollable">
                    <h2>Your cart is currently empty</h2>
                    <a href="index.php" class="btn btn-style2">Continue shopping</a>
                </div>
            </div>
            <div class="drawer-inner">
                <div class="drawer-scrollable">
                    <ul class="cart-items">
                        <li class="cart-item">
                            <div class="cart-item-info">
                                <div class="cart-item-image">
                                    <a href="javascript:void(0)">
                                        <img src="img/menu/home-pro-banner2.jpg" class="img-fluid" alt="cart-1">
                                    </a>
                                </div>
                                <div class="cart-item-details">
                                    <div class="cart-item-sub">
                                        <div class="cart-item-name">
                                            <a href="javascript:void(0)">Headphone</a>
                                        </div>
                                        <div class="cart-item-price">
                                            <span class="cart-price">$250.00</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Color:</h6>
                                            <span>Black</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Size:</h6>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="cart-qty-price-remove">
                                        <div class="cart-item-qty">
                                            <div class="js-qty-wrapper">
                                                <div class="js-qty-wrap">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-minus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                    <input type="text" class="js-qty-num" name="name" value="1"
                                                        pattern="[0-9]*">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-plus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-remove">
                                            <button type="button" class="cart-remove text-danger"><span><svg
                                                        viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="cart-item-info">
                                <div class="cart-item-image">
                                    <a href="javascript:void(0)">
                                        <img src="img/menu/home-pro-banner4.jpg" class="img-fluid" alt="cart-2">
                                    </a>
                                </div>
                                <div class="cart-item-details">
                                    <div class="cart-item-sub">
                                        <div class="cart-item-name">
                                            <a href="javascript:void(0)">Earbuds</a>
                                        </div>
                                        <div class="cart-item-price">
                                            <span class="cart-price">$190.00</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Color:</h6>
                                            <span>Black</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Size:</h6>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="cart-qty-price-remove">
                                        <div class="cart-item-qty">
                                            <div class="js-qty-wrapper">
                                                <div class="js-qty-wrap">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-minus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                    <input type="text" class="js-qty-num" name="name" value="1"
                                                        pattern="[0-9]*">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-plus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-remove">
                                            <button type="button" class="cart-remove text-danger"><span><svg
                                                        viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="cart-item-info">
                                <div class="cart-item-image">
                                    <a href="javascript:void(0)">
                                        <img src="img/menu/home-pro-banner6.jpg" class="img-fluid" alt="cart-3">
                                    </a>
                                </div>
                                <div class="cart-item-details">
                                    <div class="cart-item-sub">
                                        <div class="cart-item-name">
                                            <a href="javascript:void(0)">JBL speaker</a>
                                        </div>
                                        <div class="cart-item-price">
                                            <span class="cart-price">$220.00</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Color:</h6>
                                            <span>Black</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Size:</h6>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="cart-qty-price-remove">
                                        <div class="cart-item-qty">
                                            <div class="js-qty-wrapper">
                                                <div class="js-qty-wrap">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-minus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                    <input type="text" class="js-qty-num" name="name" value="1"
                                                        pattern="[0-9]*">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-plus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-remove">
                                            <button type="button" class="cart-remove text-danger"><span><svg
                                                        viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="cart-item-info">
                                <div class="cart-item-image">
                                    <a href="javascript:void(0)">
                                        <img src="img/menu/home-pro-banner8.jpg" class="img-fluid" alt="cart-4">
                                    </a>
                                </div>
                                <div class="cart-item-details">
                                    <div class="cart-item-sub">
                                        <div class="cart-item-name">
                                            <a href="javascript:void(0)">Cemera</a>
                                        </div>
                                        <div class="cart-item-price">
                                            <span class="cart-price">$220.00</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Color:</h6>
                                            <span>Black</span>
                                        </div>
                                        <div class="cart-item-variants">
                                            <h6>Size:</h6>
                                            <span>XL</span>
                                        </div>
                                    </div>
                                    <div class="cart-qty-price-remove">
                                        <div class="cart-item-qty">
                                            <div class="js-qty-wrapper">
                                                <div class="js-qty-wrap">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-minus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                    <input type="text" class="js-qty-num" name="name" value="1"
                                                        pattern="[0-9]*">
                                                    <button type="button"
                                                        class="js-qty-adjust ju-qty-adjust-plus"><span><svg
                                                                viewBox="0 0 24 24" width="16" height="16"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="css-i6dzq1">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-remove">
                                            <button type="button" class="cart-remove text-danger"><span><svg
                                                        viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                                        stroke-width="2" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="drawer-notes">
                        <label for="cartnote">Order note</label>
                        <textarea name="note" class="cart-notes" id="cartnote"></textarea>
                    </div>
                </div>
                <div class="drawer-footer">
                    <div class="drawer-total">
                        <span class="drawer-subtotal">Subtotal</span>
                        <span class="drawer-totalprice">$880.00</span>
                    </div>
                    <div class="drawer-ship-text">
                        <span>Shipping, taxes, and discount codes calculated at checkout</span>
                    </div>
                    <div class="drawer-cart-checkout">
                        <div class="cart-checkout-btn">
                            <button type="button" onclick="location. href='checkout-style1.html'"
                                class="btn btn-style">Checkout</button>
                            <button type="button" onclick="location. href='cart-page.html'" class="btn btn-style2">View
                                cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- cart-drawer end -->
    <!-- quickview modal start -->
    <div class="productmodal">
        <div class="modal fade" id="quickview">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-quickview">Quickview</h6>
                        <button type="button" class="close" data-bs-dismiss="modal"><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body">
                        <!-- quickview-sliderstart -->
                        <div class="quickview-slider">
                            <div class="swiper gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="product-details.php"><img src="img/product/home3-p5.jpg"
                                                class="img-fluid" alt="p-1"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="product-details.php"><img src="img/product/home3-p7.jpg"
                                                class="img-fluid" alt="p-2"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="product-details.php"><img src="img/product/home3-p9.jpg"
                                                class="img-fluid" alt="p-3"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="product-details.php"><img src="img/product/home3-p11.jpg"
                                                class="img-fluid" alt="p-4"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="product-details.php"><img src="img/product/home3-p13.jpg"
                                                class="img-fluid" alt="p-5"></a>
                                    </div>
                                </div>
                                <div class="swiper-button">
                                    <button class="quick-prev"><i class="fas fa-chevron-left"></i></button>
                                    <button class="quick-next"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                            <div class="swiper gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)"><img src="img/product/home3-p5.jpg"
                                                class="img-fluid" alt="p-1"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)"><img src="img/product/home3-p7.jpg"
                                                class="img-fluid" alt="p-2"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)"><img src="img/product/home3-p9.jpg"
                                                class="img-fluid" alt="p-3"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)"><img src="img/product/home3-p11.jpg"
                                                class="img-fluid" alt="p-4"></a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)"><img src="img/product/home3-p13.jpg"
                                                class="img-fluid" alt="p-5"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- quickview-slider end -->
                        <!-- quick-view-content start -->
                        <div class="quick-view-content">
                            <div class="pro-nprist">
                                <!-- product-title start -->
                                <div class="product-title">
                                    <span>Electon-store</span>
                                    <h6>Boat</h6>
                                </div>
                                <!-- product-title end -->
                                <!-- product-price start -->
                                <div class="product-price">
                                    <div class="pro-price-box">
                                        <span class="new-price">$237.00</span>
                                        <span class="old-price">$250.00</span>
                                    </div>
                                </div>
                                <!-- product-price end -->
                                <!-- product-rating start -->
                                <div class="product-ratting">
                                    <span class="pro-ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </span>
                                </div>
                                <!-- product-rating end -->
                                <!-- product-desc start -->
                                <div class="product-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magn</p>
                                </div>
                                <!-- product-desc end -->
                                <form id="add-item-qv" action="javascript:void(0)/add" method="post">
                                    <div class="quick-view-select">
                                        <div class="quick-view-text">
                                            <div class="selector-wrapper">
                                                <label>Size:</label>
                                                <select data-option="option1" id="product-size">
                                                    <option value="2tb">2tb</option>
                                                    <option value="3tb">3tb</option>
                                                    <option value="4tb">4tb</option>
                                                </select>
                                            </div>
                                            <div class="selector-wrapper">
                                                <label>Color:</label>
                                                <select class="single-option-selector" data-option="option2"
                                                    id="product-color">
                                                    <option value="black">black</option>
                                                    <option value="gray">gray</option>
                                                    <option value="brown">brown</option>
                                                </select>
                                            </div>
                                            <div class="selector-wrapper">
                                                <div class="pro-qty-wrap">
                                                    <h6>Quantity:</h6>
                                                    <div class="product-quantity">
                                                        <div class="cart-plus-minus">
                                                            <button class="dec qtybutton minus"><i
                                                                    class="fa-solid fa-minus"></i></button>
                                                            <input value="1" type="text" name="quantity"
                                                                pattern="[0-9]*">
                                                            <button class="inc qtybutton plus"><i
                                                                    class="fa-solid fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quickview-buttons">
                                        <button type="button" onclick="location. href='cart-page.html'"
                                            class="btn btn-style">Add to cart</button>
                                        <a href="login.php" class="btn btn-style">
                                            <span class="icon"><i class="fa-regular fa-heart"></i></span>
                                            <span>Add to wishlist</span>
                                        </a>
                                    </div>
                                </form>
                                <!-- product-title end -->
                            </div>
                        </div>
                        <!-- quick-view-content end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- quickview modal end -->
    <!-- bg-scren start -->
    <div class="bg-screen"></div>
    <!-- bg-scren end -->
    <!-- bottom-menu start -->
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
    <!-- bottom-menu end -->
    <!-- jquery js -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific-popup js -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- owl-carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- swiper-slider js -->
    <script src="js/swiper-bundle.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <!-- waypoints js -->
    <script src="js/waypoints.min.js"></script>
    <!-- counter js -->
    <script src="js/counter.js"></script>
    <!-- foo-typewriter js -->
    <script src="js/typewriter.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
</body>

</html>