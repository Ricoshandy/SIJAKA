<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function(){
    Route::middleware('guest')->group(function () {
        
        Route::post('login', 'login')->name('login');
        Route::get('login', 'login_form');
        
    });

    Route::middleware('auth')->group(function(){
        Route::get('logout', 'logout')->name('logout');
    });

});

Route::controller(PengajuanController::class)->group(function(){
    Route::middleware('auth')->prefix('pengajuan')->group(function(){
        Route::get('{email}/{key}/{file}', 'getFile');
    });
});
