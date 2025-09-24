<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:seller,admin'])->group(function(){
    Route::post('category/toggle/{id}', [CategoryController::class, 'toggle'])->name('category.toggle');
    Route::resource('category', CategoryController::class)->names('category');
    Route::post('product/toggle/{id}', [ProductController::class, 'toggle'])->name('product.toggle');
    Route::resource('product', ProductController::class)->names('product');
    Route::resource('stock', StockMovementController::class)->names('stock');
    Route::post('ad/toggle/{id}', [AdController::class, 'toggle'])->name('ad.toggle');
    Route::resource('ad', AdController::class)->names('ad');
});

Route::middleware(['auth', 'role:seller'])->prefix('seller')->as('seller.')->group(function(){
    Route::get('dashboard', [SellerController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->as('admin.')->group(function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('user/login/approve/{id}', [UserController::class, 'approve'])->name('user.login.approve');
    Route::post('user/login/disable/{id}', [UserController::class, 'disable'])->name('user.login.disable');
    Route::resource('user', UserController::class)->names('user');
});

require __DIR__.'/auth.php';
require __DIR__.'/client.php';
