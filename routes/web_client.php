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

Route::controller(CartController::class)
    ->prefix('cart')
    ->name('cart.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('add/{product}', 'add')->name('add');
        Route::delete('remove/{cartItem}', 'remove')->name('remove');
        Route::delete('clear', 'clear')->name('clear');
    });
