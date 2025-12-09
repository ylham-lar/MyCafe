<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Client\CartController;
use App\Http\Controllers\Web\Client\HomeController;
use App\Http\Controllers\Web\Client\ProductController;
use App\Http\Controllers\Web\Client\CategoryController;
use App\Http\Controllers\Web\Client\FavoriteController;
use App\Http\Controllers\Web\Client\MenuController;

Route::get('locale/{locale}', [HomeController::class, 'locale'])->name('locale')->where('locale', '[a-z]+');


Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/card', 'card')->name('card');
    });

Route::controller(MenuController::class)
    ->group(function () {
        Route::get('/menu', 'index')->name('menu');
    });


Route::controller(CategoryController::class)
    ->prefix('categories')
    ->name('client.categories.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'products')->name('products');
    });


Route::controller(ProductController::class)
    ->prefix('products')
    ->name('client.products.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });


Route::prefix('cart')
    ->name('client.cart.')
    ->controller(CartController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/add/{product}', 'add')->name('add');
        Route::post('/delete/{product}', 'remove')->name('delete');
        Route::post('/clear', 'clearCart')->name('clear');
    });


Route::controller(FavoriteController::class)
    ->prefix('favorites')
    ->name('client.favorites.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/toggle/{product}', 'toggle')->name('toggle');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
        Route::delete('/remove-all', 'destroyAll')->name('destroyAll');
    });
