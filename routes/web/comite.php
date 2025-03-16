<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'comite'])->prefix('comite')->group(function(){

    // Route Untuk Mengarahkan User dengan Role comite ke Dashboard comite
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'comite_dashboard')->name('comite_dashboard');
    });
    
});
