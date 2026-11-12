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
    $table->string('PT. Wabi Teknologi Indonesia'); // Nama perusahaan/instansi tempat PKL
    $table->text('UTDI Building, Jl. Raya Janti No. 143, Karang Jambe, Yogyakarta 55198'); // Alamat lengkap DUDI
    $table->string('Bagas')->nullable(); // Nama pimpinan atau penanggung jawab
    $table->string('+62 813-3593-7700')->nullable(); // Nomor HP/Telepon instansi
    $table->integer('3')->default(0); // Kuota siswa yang bisa diterima
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
