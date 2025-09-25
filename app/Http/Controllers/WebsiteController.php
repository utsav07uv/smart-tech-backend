<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Ad;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function home () {
        return view('frontend.pages.home', [
            'sellers' => User::where('role', UserRole::SELLER)->select(['id', 'name', 'avatar'])->get(),
            'featuredSectionAds' => Ad::where('placement', 1)->inRandomOrder()->take(3)->get(),
            'footerAd' => Ad::where('placement', 2)->inRandomOrder()->first(),
            'recommendedProducts' => Product::withoutGlobalScopes()->recommended()->active()->inRandomOrder()->get(),
            'comingSoonProducts' => Product::withoutGlobalScopes()->coming()->active()->inRandomOrder()->get(),
        ]);
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

    public function wishlist () {
        $wishlistItems = WishlistItem::whereHas('wishlist', fn ($query) => $query->where('user_id', Auth::id()))->with('product')->get();
        return view('frontend.pages.wishlist', [
            'wishlistItems' => $wishlistItems
        ]);
    }

    public function cart () {
        $cartItems = CartItem::whereHas('cart', fn ($query) => $query->where('user_id', Auth::id()))->with('product')->get();
        return view('frontend.pages.cart', [
            'cartItems' => $cartItems
        ]);
    }

    public function productShow () {
        return view('frontend.pages.register');
    }

    public function productIndex () {
        return view('frontend.pages.register');
    }
}
