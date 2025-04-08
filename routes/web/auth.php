<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::middleware('guest')->group(function () {
        
        // Tampilkan Form Login
        Route::get('login', 'login_form')->name('login.form');
        
        // Proses Login (POST)
        Route::post('login', 'login')->name('login');

    });
});
