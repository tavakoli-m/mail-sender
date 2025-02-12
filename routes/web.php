<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function(){

    // Register
    Route::prefix('register')->controller(RegisterController::class)->group(function(){
        Route::get('/','registerForm')->name('register-form');
        Route::post('/','register')->name('register');
    });

    // Login
    Route::prefix('login')->controller(LoginController::class)->group(function(){
        Route::get('/','loginForm')->name('login-form');
        Route::post('/','login')->name('login');
    });

    // Logout
    Route::get('/logout',LogoutController::class)->name('logout')->middleware('auth');
});


Route::prefix('dashboard')->name('dashboard.')->group(function(){

    // Dashboard
    Route::get('/',DashboardController::class)->name('index');
});
