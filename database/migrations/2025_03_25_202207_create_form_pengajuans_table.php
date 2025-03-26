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
        Schema::create('form_pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('rumpun', ['UMUM', 'AGAMA'])->default('UMUM');
            $table->enum('usul', ['ASISTEN_AHLI', 'LEKTOR', 'LEKTOR_KEPALA', 'GURU_BESAR'])->default('ASISTEN_AHLI');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_pengajuans');
    }
};
