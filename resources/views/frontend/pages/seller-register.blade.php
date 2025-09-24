@extends('frontend.layouts.app')
@section('content')
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-index">
                        <ul class="breadcrumb-ul">
                            <li class="breadcrumb-li">
                                <a class="breadcrumb-link" href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-li">
                                <span class="breadcrumb-text">Create Account</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="customer-page section-ptb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center align-items-center my-5">
                        <button class="btn btn-style"><a href="{{ route('register') }}" class="text-white">Register as user</a></button>
                        <button class="btn btn-style" disabled><a href="{{ route('seller.register') }}" class="text-white">Register as
                                seller</a></button>
                    </div>

                    <div class="section-capture">
                        <div class="section-title">
                            <h2 data-animate="animate__fadeInUp"><span>Create account</span></h2>
                        </div>
                    </div>

                    <div class="log-acc-page">
                        <div class="contact-form-list">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="role" value="seller">

                                <ul class="form-fill">
                                    <li class="form-fill-li Name" data-animate="animate__fadeInUp">
                                        <label>Name</label>
                                        <input type="text" name="name" autocomplete="name" placeholder="Name" required
                                            autofocus>
                                    </li>

                                    <li class="form-fill-li Email" data-animate="animate__fadeInUp">
                                        <label>Email address</label>
                                        <input type="email" name="email" autocomplete="email" placeholder="Email address"
                                            required autofocus>
                                    </li>

                                    <li class="form-fill-li Phone number" data-animate="animate__fadeInUp">
                                        <label>Phone number</label>
                                        <input type="tel" name="phone" placeholder="Phone number" required autofocus>
                                    </li>

                                    <li class="form-fill-li Password" data-animate="animate__fadeInUp">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Password" required autofocus>
                                    </li>

                                    <li class="form-fill-li Password" data-animate="animate__fadeInUp">
                                        <label>Password Confirmation</label>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation" required autofocus>
                                    </li>

                                    <li class="form-fill-li Password" data-animate="animate__fadeInUp">
                                        <label>Logo</label>
                                        <input type="file" name="avatar" required autofocus>
                                    </li>

                                    <li class="form-fill-li Password" data-animate="animate__fadeInUp">
                                        <label>Documents (Registration, PAN)</label>
                                        <input type="file" name="documents[]" multiple required autofocus>
                                    </li>
                                </ul>
                                <div class="form-action-button">
                                    <div class="read-agree">
                                        <label data-animate="animate__fadeInUp">
                                            <span class="agree-text">I have read and agree with the
                                                <a href="javascript:void(0)" class="text-primary">terms & condition.</a>
                                            </span>
                                            <input type="checkbox" name="terms" class="cust-checkbox create-checkbox"
                                                required autofocus>
                                            <span class="cust-check"></span>
                                        </label>
                                        <button type="submit" class="btn btn-style2 create disabled"
                                            data-animate="animate__fadeInUp">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="acc-wrapper" data-animate="animate__fadeInUp">
                            <h6>Already have account?</h6>
                            <div class="account-optional">
                                <a href="{{ route('login') }}">Log in</a>
                            </div>
                        </div>
                    </div>
                    <!-- account login start -->
                </div>
            </div>
        </div>
    </section>
@endsection