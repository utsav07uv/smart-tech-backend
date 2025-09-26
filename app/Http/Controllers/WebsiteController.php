<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Ad;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    public function productShow ($slug) {
        $product = Product::where('slug', $slug)->with(['seller', 'category'])->first();
        return view('frontend.pages.product-show', [
            'product' => $product
        ]);
    }

    public function productIndex () {
        
        $products = Product::query()
        ->when(request()->filled('category'), function ($query) {
            $query->whereHas('category', function ($subQuery) {
                $subQuery->where('name', request()->category);
            });
        })
        ->when(request()->filled('vendor'), function ($query) {
            $query->whereHas('seller', function ($subQuery) {
                $subQuery->where('name', request()->vendor);
            });
        })
        ->when(request()->filled('search'), function ($query) {
            $query->where('name', 'like', '%' . request()->search . '%');
        })
        ->paginate(12);
        return view('frontend.pages.product', [
            'products' => $products
        ]);
    }

    public function vendorIndex () {
        $vendors = User::where('role', 'seller')->get();
        return view('frontend.pages.vendor', [
            'vendors' => $vendors
        ]);
    }

    public function order() {
        return view('frontend.pages.order');
    }
    public function profile() {
        return view('frontend.pages.profile');
    }

    public function contact() {
        return view('frontend.pages.contact');
    }

    public function address() {
        return view('frontend.pages.address');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => ['nullable', 'confirmed']
        ]);

        $user->fill(Arr::except($validated, 'password'));

        if ($user->role === UserRole::SELLER && $user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        toastr()->success('Profile updated successfully.');

        return back();
    }
}
