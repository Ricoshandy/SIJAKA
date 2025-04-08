<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progres_pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pengajuan_id')->references('id')->on('pengajuans');
            $table->foreignUuid('verified_by')->references('id')->on('users');
            $table->enum('status', ['DRAFT', 'BARU', 'DALAM_PROSES', 'DISETUJUI', 'DITOLAK', 'REVISI'])->default('DRAFT');
            $table->enum('tahap', ['PERLU_DILENGKAPI', 'VERIFIKASI_BERKAS', 'SIDANG_KOMITE', 'SIDANG_SENAT', 'PENGAJUAN_SISTER', 'SK_KENAIKAN'])->default('PERLU_DILENGKAPI');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_pengajuans');
    }
    
};
