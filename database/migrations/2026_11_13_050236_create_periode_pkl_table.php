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
        Schema::create('periode_pkl', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status', ['persiapan', 'pengajuan','berjalan', 'penilaian', 'selesai'])->default('persiapan');
            $table->unsignedBigInteger('maks_pilihan_mitra')->default(3);
            $table->unsignedTinyInteger('batas_hari_tidak_isi')->default(2);
            $table->unsignedTinyInteger('batas_hari_isi_mundur')->default(3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_pkl');
    }
};
