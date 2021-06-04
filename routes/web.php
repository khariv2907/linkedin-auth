<?php

use App\Http\Controllers\Auth\LinkedinController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');

/**
 * Auth
 */
Route::group([
    'as' => 'auth.',
    'prefix' => 'auth'
], function() {
    // Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

    // LinkedIn
    Route::group([
        'as' => 'linkedin.',
        'prefix' => 'linkedin'
    ], function() {
        Route::get('/redirect', [LinkedinController::class, 'index'])->name('redirect');
        Route::get('/callback', [LinkedinController::class, 'callback'])->name('callback');
    });
});

