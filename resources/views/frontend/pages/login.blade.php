@extends('frontend.layouts.app')
@section('content')
    <div class="main">
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-index">
                            <ul class="breadcrumb-ul">
                                <li class="breadcrumb-li">
                                    <a class="breadcrumb-link" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-li">
                                    <span class="breadcrumb-text">Account</span>
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
                        <div class="log-acc" id="CustomerLoginForm">
                            <div class="section-capture">
                                <div class="section-title">
                                    <h2 data-animate="animate__fadeInUp"><span>Login account</span></h2>
                                </div>
                            </div>
                            <div class="log-acc-page">
                                <div class="contact-form-list">
                                    <form method="post" action="{{  route('login') }}">
                                        @csrf
                                        <ul class="form-fill">
                                            <li class="form-fill-li Email" data-animate="animate__fadeInUp">
                                                <label>Email address</label>
                                                <input type="email" name="email" autocomplete="email"
                                                    placeholder="Email address" required autofocus>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                            </li>

                                            <li class="form-fill-li Password" data-animate="animate__fadeInUp">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="Password" required
                                                    autofocus>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </li>

                                        </ul>
                                        <div class="form-action-button" data-animate="animate__fadeInUp">
                                            <div class="button-forget">
                                                <button type="submit" class="btn btn-style2">Log in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="acc-wrapper" data-animate="animate__fadeInUp">
                                    <h6>Don't have an account?</h6>
                                    <div class="account-optional">
                                        <a href="{{ route('register') }}l">Create a account</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection