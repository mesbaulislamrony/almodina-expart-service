<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SubscribeController;

Route::get('/', [WelcomeController::class, 'home'])->name('welcome');
Route::get('/categories/{slug}', [WelcomeController::class, 'categories'])->name('categories');
Route::get('/services/{slug}', [WelcomeController::class, 'services'])->name('services');
Route::get('/product/{slug}', [WelcomeController::class, 'product'])->name('product');
Route::post('/current/location', [WelcomeController::class, 'setCurrentLocation'])->name('current.location');
Route::post('/subscribe', SubscribeController::class)->name('subscribe.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/', [CartController::class, 'store'])->name('store');
        Route::delete('/{id}', [CartController::class, 'destroy'])->name('destroy');
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
        Route::prefix('wishlist')->name('wishlist.')->group(function () {
            Route::get('/', [WishlistController::class, 'index'])->name('index');
            Route::post('/{id}', [WishlistController::class, 'store'])->name('store');
            Route::delete('/{id}', [WishlistController::class, 'destroy'])->name('destroy');
        });
    });
});

require __DIR__ . '/auth.php';