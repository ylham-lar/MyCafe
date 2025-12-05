<?php

use App\Http\Controllers\Web\Client\CartController;
use App\Http\Controllers\Web\Client\CategoryController;
use App\Http\Controllers\Web\Client\HomeController;
use App\Http\Controllers\Web\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('card', 'card')->name('card');
    });

Route::controller(CategoryController::class)
    ->prefix('categories')
    ->name('client.categories.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'products')->name('products');
    });

Route::controller(ProductController::class)
    ->prefix('products')
    ->name('client.products.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')->name('show');
    });

Route::prefix('client')->name('client.')->group(function () {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/destroy/{product}', [CartController::class, 'destroy'])->name('cart.delete');
});
