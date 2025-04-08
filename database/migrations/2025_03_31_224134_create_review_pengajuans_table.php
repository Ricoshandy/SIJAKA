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
        Schema::create('review_pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pengajuan_id')->references('id')->on('pengajuans');
            $table->foreignUuid('verified_by')->references('id')->on('users');
            $table->string('key');
            $table->boolean('is_verified')->default(false);
            $table->text('keterangan')->nullable();
            $table->integer('version');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_pengajuans');
    }
};
