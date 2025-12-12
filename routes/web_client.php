<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Client\CartController;
use App\Http\Controllers\Web\Client\HomeController;
use App\Http\Controllers\Web\Client\MenuController;
use App\Http\Controllers\Web\Client\OrderController;
use App\Http\Controllers\Web\Client\ProductController;
use App\Http\Controllers\Web\Client\CategoryController;
use App\Http\Controllers\Web\Client\CustomerController;
use App\Http\Controllers\Web\Client\FavoriteController;


Route::get('locale/{locale}', [HomeController::class, 'locale'])
    ->name('locale')
    ->where('locale', '[a-z]+');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/card', 'card')->name('card');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::prefix('categories')
    ->name('client.categories.')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{category}', 'products')->name('products');
    });


Route::prefix('products')
    ->name('client.products.')
    ->controller(ProductController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{product}', 'show')->name('show');
    });

Route::prefix('cart')
    ->name('client.cart.')
    ->controller(CartController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/add/{product}', 'add')->name('add');
        Route::delete('/delete/{product}', 'remove')->name('delete');
        Route::delete('/clear', 'clearCart')->name('clear');
    });

Route::prefix('favorites')
    ->name('client.favorites.')
    ->controller(FavoriteController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('/toggle/{product}', 'toggle')->name('toggle');
        Route::delete('/remove-all', 'destroyAll')->name('destroyAll');
        Route::delete('/{favorite}', 'destroy')->name('destroy');
    });

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/create', 'create')->name('client.customer.create');
    Route::post('/customer/store', 'store')->name('client.customer.store');
});

Route::prefix('order')
    ->name('client.order.')
    ->controller(OrderController::class)
    ->group(function () {
        Route::get('/payment-method', 'showPaymentMethod')->name('payment_method');
        Route::post('/create', 'createOrder')->name('create');
        Route::get('/success', 'success')->name('success');
    });


Route::get('/order/payment/{customer}', [OrderController::class, 'payment'])->name('client.order.payment');
Route::post('/order/order', [OrderController::class, 'store'])->name('client.order.store');

Route::get('/order/success', [OrderController::class, 'success'])->name('client.order.success');
