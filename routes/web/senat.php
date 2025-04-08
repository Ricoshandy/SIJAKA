<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SidangPengajuanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'senat'])->prefix('senat')->group(function(){

    // Route Untuk Mengarahkan User dengan Role senat ke Dashboard senat
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard', 'senat_dashboard')->name('senat_dashboard');
    });
    
    Route::controller(PengajuanController::class)->group(function(){
        Route::get('pengajuan/list', 'senat_pengajuan_list')->name('senat.pengajuan.list');
        Route::get('pengajuan/sidang/komite/{id}', 'sidang_senat_view')->name('sidang.senat.view');
    });

    Route::controller(SidangPengajuanController::class)->group(function(){
        Route::post('pengajuan/sidang/{pengajuanId}/komite', 'action_sidang_senat')->name('action.sidang.senat');
    });
});
