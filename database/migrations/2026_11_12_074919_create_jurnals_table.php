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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
    $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade'); // Relasi ke siswa yang mengisi
    $table->date('tanggal'); // Tanggal kegiatan harian
    $table->text('kegiatan'); // Deskripsi pekerjaan/kegiatan PKL
    $table->string('foto')->nullable(); // Bukti dokumentasi kegiatan
    $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending'); // Status validasi pembimbing
    $table->text('catatan_pembimbing')->nullable(); // Catatan dari guru/pembimbing industri
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
