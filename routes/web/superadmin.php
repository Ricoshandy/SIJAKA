<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'superadmin'])->prefix('superadmin')->group(function(){

    // Route Untuk Mengarahkan User dengan Role superadmin ke Dashboard superadmin
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'superadmin_dashboard')->name('superadmin_dashboard');
    });
    
});
