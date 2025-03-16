<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'kepegawaian'])->prefix('kepegawaian')->group(function(){

    // Route Untuk Mengarahkan User dengan Role kepegawaian ke Dashboard kepegawaian
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'kepegawaian_dashboard')->name('kepegawaian_dashboard');
    });
    
});
