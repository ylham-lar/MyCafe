<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\LoginController;
use App\Http\Controllers\Web\Admin\DashboardController;

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::prefix('admin')
            ->name('admin.')
            ->group(function () {
                Route::get('', [DashboardController::class, 'index'])->name('dashboard');
            });
    });
Route::middleware('auth')
    ->group(function () {
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
