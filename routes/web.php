<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NotificationControlelr;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewControlelr;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'home'])->name('welcome');
Route::get('/categories/{slug}', \App\Http\Controllers\CategoryController::class)->name('categories');
Route::get('/services/{slug}', \App\Http\Controllers\ServiceController::class)->name('services');
Route::post('/subscribe', SubscribeController::class)->name('subscribe.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::delete('/{id}', [CartController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::post('/{id}', [WishlistController::class, 'store'])->name('store');
        Route::delete('/{id}', [WishlistController::class, 'destroy'])->name('destroy');
    });
    Route::middleware('verified')->group(function () {
        Route::prefix('booking')->name('booking.')->group(function () {
            Route::get('/', [BookingController::class, 'index'])->name('index');
            Route::get('/{id}', [BookingController::class, 'show'])->name('show');
        });
        Route::prefix('checkout')->name('checkout.')->group(function () {
            Route::get('/', [CheckoutController::class, 'create'])->name('create');
            Route::post('/', [CheckoutController::class, 'store'])->name('store');
        });
        Route::prefix('reviews')->name('reviews.')->group(function () {
            Route::get('/', [ReviewControlelr::class, 'index'])->name('index');
            Route::post('/{service}/store', [ReviewControlelr::class, 'store'])->name('store');
            Route::delete('/{id}', [ReviewControlelr::class, 'destroy'])->name('destroy');
        });
        // Route::prefix('product/review')->name('product.review.')->group(function () {
        //     Route::get('/{slug}/create', [ReviewControlelr::class, 'create'])->name('create');
        //     Route::post('/{slug}/store', [ReviewControlelr::class, 'store'])->name('store');
        // });
        Route::get('/notification', NotificationControlelr::class)->name('notification.index');
    });
});

require __DIR__.'/auth.php';
