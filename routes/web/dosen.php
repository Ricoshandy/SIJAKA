<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'dosen'])->prefix('dosen')->group(function(){

    // Route Untuk Mengarahkan User dengan Role Dosen ke Dashboard Dosen
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'dosen_dashboard')->name('dosen_dashboard');
    });
    
});
