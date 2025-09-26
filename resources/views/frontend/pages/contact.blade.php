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
                                <span class="breadcrumb-text">Contact us</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="get-info-area section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="about-content">
                        <!-- about title start -->
                        <div class="section-capture">
                            <div class="section-title">
                                <h2 data-animate="animate__fadeInUp"><span>Get in touch</span></h2>
                            </div>
                        </div>
                        <!-- about title end -->
                        <!-- contact-detail start -->
                        <div class="get-info contact-detail">
                            <ul class="get-info-ul">
                                <li class="get-info-li" data-animate="animate__fadeInUp">
                                    <span class="get-icon"><i class="bi bi-geo"></i></span>
                                    <span class="get-add contact-block">
                                        <span>Thomas may place,</span>
                                        <span>Amos Street, NSW, Australia</span>
                                    </span>
                                </li>
                                <li class="get-info-li" data-animate="animate__fadeInUp">
                                    <span class="get-icon"><i class="bi bi-telephone"></i></span>
                                    <div class="contact-block">
                                        <a href="tel:(+61)423456789" class="get-add">(+61) 4 23 45 67 89</a>
                                    </div>
                                </li>
                                <li class="get-info-li" data-animate="animate__fadeInUp">
                                    <span class="get-icon"><i class="bi bi-envelope"></i></span>
                                    <div class="contact-block">
                                        <a href="mailto:smarttech@support.com" class="get-add">smarttech@support.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- contact-detail end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- get-info-area end -->
    <!-- google-map  start -->
    <section class="google-map section-pb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="map-wrap">
                        <div class="map-wrapper" data-animate="animate__fadeInUp">
                            <div class="map-info" id="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3314.857144106461!2d150.99100757644686!3d-33.81599947324685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a2ddc8e8a64d%3A0xb720ada8d96f5d1b!2sThomas%20May%20Pl%2C%20Westmead%20NSW%202145!5e0!3m2!1sen!2sau!4v1757088980997!5m2!1sen!2sau"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- google-map  end -->
    <!-- drop-detail  start -->
    <section class="drop-detail section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- contact us title start -->
                    <div class="section-capture">
                        <div class="section-title">
                            <h2 data-animate="animate__fadeInUp"><span>Drop us message</span></h2>
                        </div>
                    </div>
                    <!-- contact us title end -->
                    <!-- contact us from start -->
                    <div class="form-warp contact-detail">
                        <div class="contact-form-list">
                            <form method="post">
                                <ul class="form-fill">
                                    <li class="form-fill-li Name" data-animate="animate__fadeInUp">
                                        <label>Name</label>
                                        <input type="text" name="q" autocomplete="name" placeholder="Name">
                                    </li>
                                    <li class="form-fill-li Email" data-animate="animate__fadeInUp">
                                        <label>Email address</label>
                                        <input type="email" name="q" autocomplete="email" placeholder="Email address">
                                    </li>
                                    <li class="form-fill-li Phone number" data-animate="animate__fadeInUp">
                                        <label>Phone number</label>
                                        <input type="tel" name="q" placeholder="Phone number">
                                    </li>
                                    <li class="form-fill-li Message" data-animate="animate__fadeInUp">
                                        <label>Message</label>
                                        <textarea rows="10" placeholder="Message" class="custom-textarea"></textarea>
                                    </li>
                                </ul>
                                <div class="contact-submit" data-animate="animate__fadeInUp">
                                    <button type="submit" class="btn btn-style2">
                                        <span>Send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- contact us from start -->
                </div>
            </div>
        </div>
    </section>
@endsection