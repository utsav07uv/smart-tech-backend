<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home () {
        return view('frontend.pages.home');
    }

    public function login () {
        return view('frontend.pages.login');
    }

    public function register () {
        return view('frontend.pages.register');
    }

    public function sellerRegister () {
        return view('frontend.pages.seller-register');
    }
}
