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
        Schema::create('mitra_dudis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_perusahaan');
        $table->string('bidang_usaha');
        $table->string('nomor_mou');
        $table->string('status_mou')->default('MoU Aktif Legal');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitra_dudis');
    }
};
