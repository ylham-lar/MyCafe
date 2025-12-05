<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\LoginController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\CategoryController;
use App\Http\Controllers\Web\Admin\CustomerController;
use App\Http\Controllers\Web\Admin\OrderController;
use App\Http\Controllers\Web\Admin\ProductController;

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(CategoryController::class)
            ->prefix('categories')
            ->name('categories.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(ProductController::class)
            ->prefix('products')
            ->name('products.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(CustomerController::class)
            ->prefix('customers')
            ->name('customers.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });

        Route::controller(OrderController::class)
            ->prefix('orders')
            ->name('orders.')
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('', 'store')->name('store');
                Route::get('{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
                Route::put('{id}', 'update')->name('update')->where('id', '[0-9]+');
                Route::delete('{id}', 'destroy')->name('destroy')->where('id', '[0-9]+');
            });
    });


Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
