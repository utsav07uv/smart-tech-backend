<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

   Route::get('/', [WebsiteController::class, 'home'])->name('home'); 
   Route::get('/login', [WebsiteController::class, 'login'])->name('login'); 
   Route::get('/register', [WebsiteController::class, 'register'])->name('register'); 
   Route::get('/register/seller', [WebsiteController::class, 'sellerRegister'])->name('seller.register');
   
   Route::get('/my-profile', [WebsiteController::class, 'profile'])->name('frontend.profile');
   Route::put('/my-profile', [WebsiteController::class, 'updateProfile'])->name('frontend.profile.update');

      Route::get('/order-history', [WebsiteController::class, 'order'])->name('frontend.order');

   Route::get('/vendors', [WebsiteController::class, 'vendorIndex'])->name('frontend.vendor.index');


   Route::get('/products/list', [WebsiteController::class, 'productIndex'])->name('frontend.product.index');
   Route::get('/products/{slug}', [WebsiteController::class, 'productShow'])->name('frontend.product.show');

Route::middleware('auth')->group(function () {
   Route::get('/wishlist', [WebsiteController::class, 'wishlist'])->name('frontend.product.wishlist');
   Route::get('/cart', [WebsiteController::class, 'cart'])->name('frontend.product.cart');
   Route::delete('/wishlist/clear', [WishlistController::class, 'clear'])->name('frontend.wishlist.clear');
   Route::delete('/cart/clear', [CartController::class, 'clear'])->name('frontend.cart.clear');
   Route::post('/product/{id}/wishlist', [WishlistController::class, 'store'])->name('frontend.product.wishlist.add');
   Route::delete('/product/{id}/wishlist', [WishlistController::class, 'destroy'])->name('frontend.product.wishlist.destroy');
   Route::post('/product/{id}/cart', [CartController::class, 'store'])->name('frontend.product.cart.add');
   Route::delete('/product/{id}/cart', [WebsiteController::class, 'addToCart'])->name('frontend.product.cart.destroy');
});
