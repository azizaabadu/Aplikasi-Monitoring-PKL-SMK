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
        Schema::create('dudis', function (Blueprint $table) {
            $table->id();
    $table->string('nama_dudi'); // Kolom untuk nama perusahaan/instansi
    $table->text('alamat'); // Kolom untuk alamat lengkap DUDI
    $table->string('pimpinan')->nullable(); // Kolom untuk nama pimpinan
    $table->string('kontak')->nullable(); // Kolom untuk nomor HP/Telepon
    $table->integer('kuota')->default(0); // Kolom untuk kuota siswa
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dudis');
    }
};
