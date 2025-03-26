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
        Schema::create('form_pengajuan_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('form_pengajuan_id')->references('id')->on('form_pengajuans');
            $table->string('key');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('detail')->nullable();
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_pengajuan_details');
    }
};
