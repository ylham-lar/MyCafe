<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Client\{
    HomeController,
    MenuController,
    CategoryController,
    ProductController,
    CartController,
    FavoriteController,
    CustomerController,
    OrderController
};



Route::get('locale/{locale}', [HomeController::class, 'locale'])
    ->name('locale')
    ->where('locale', '[a-z]+');


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/menu', [MenuController::class, 'index'])->name('menu');


Route::prefix('categories')
    ->name('client.categories.')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{category}', 'products')->name('products');
    });


Route::prefix('products')
    ->name('client.products.')
    ->controller(ProductController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('{product}', 'show')->name('show');
    });


Route::prefix('cart')
    ->name('client.cart.')
    ->controller(CartController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('add/{product}', 'add')->name('add');
        Route::post('update/{product}', 'update')->name('update');
        Route::delete('delete/{product}', 'remove')->name('delete');
        Route::delete('clear', 'clearCart')->name('clear');
    });

Route::prefix('favorites')
    ->name('client.favorites.')
    ->controller(FavoriteController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('toggle/{product}', 'toggle')->name('toggle');
        Route::delete('remove-all', 'destroyAll')->name('destroyAll');
        Route::delete('{favorite}', 'destroy')->name('destroy');
    });


Route::prefix('customer')
    ->name('client.customer.')
    ->controller(CustomerController::class)
    ->group(function () {
        Route::get('register', 'create')->name('create');
        Route::post('register', 'store')->name('store');
    });


Route::prefix('order')
    ->name('client.order.')
    ->controller(OrderController::class)
    ->group(function () {
        Route::get('payment', 'payment')->name('payment');
        Route::post('store', 'store')->name('store');
        Route::get('success', 'success')->name('success');
    });
