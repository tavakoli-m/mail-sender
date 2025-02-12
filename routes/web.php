<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EmailController;
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

    Route::prefix('email')->name('email.')->controller(EmailController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/new','create')->name('new');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{email}','edit')->name('edit');
        Route::put('/edit/{email}','update')->name('update');
        Route::delete('/delete/{email}','destroy')->name('delete');
    });
});
