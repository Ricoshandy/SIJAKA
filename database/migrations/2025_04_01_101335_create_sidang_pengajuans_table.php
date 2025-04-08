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
        Schema::create('sidang_pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pengajuan_id')->references('id')->on('pengajuans');
            $table->foreignUuid('verified_by')->references('id')->on('users');
            $table->string('berita_acara');
            $table->enum('sidang', ['KOMITE', 'SENAT'])->default('KOMITE');
            $table->enum('status', ['LULUS', 'REVISI', 'TIDAK_LULUS'])->default('LULUS');
            $table->text('keterangan')->nullable();
            $table->integer('version')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sidang_pengajuans');
    }
};
