<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
   Route::get('/', [WebsiteController::class, 'home'])->name('home'); 
   Route::get('/login', [WebsiteController::class, 'login'])->name('login'); 
   Route::get('/register', [WebsiteController::class, 'register'])->name('register'); 
   Route::get('/register/seller', [WebsiteController::class, 'sellerRegister'])->name('seller.register');
});

