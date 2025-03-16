<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'senat'])->prefix('senat')->group(function(){

    // Route Untuk Mengarahkan User dengan Role senat ke Dashboard senat
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'senat_dashboard')->name('senat_dashboard');
    });
    
});
