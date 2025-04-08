<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ReviewPengajuanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'kepegawaian'])->prefix('kepegawaian')->group(function(){

    // Route Untuk Mengarahkan User dengan Role kepegawaian ke Dashboard kepegawaian
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'kepegawaian_dashboard')->name('kepegawaian_dashboard');
    });

    Route::controller(PengajuanController::class)->group(function(){
        Route::get('pengajuan/list', 'kepegawaian_pengajuan_list')->name('kepegawaian.pengajuan.list');
        Route::get('pengajuan/review/{id}', 'pengajuan_review')->name('pengajuan.review');
    });

    Route::controller(ReviewPengajuanController::class)->group(function(){
        Route::post('pengajuan/review/{pengajuanId}/action', 'action_review')->name('action.review');
    });
    
});
