<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::middleware('guest')->group(function () {
        
        Route::post('login', 'login')->name('login');
        Route::get('login', 'login_form');
    
    });
});
