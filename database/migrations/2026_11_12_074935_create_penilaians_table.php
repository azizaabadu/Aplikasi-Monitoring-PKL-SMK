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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
    $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
    $table->integer('nilai_teknis')->default(0); // Nilai kompetensi keahlian dari industri
    $table->integer('nilai_non_teknis')->default(0); // Nilai kedisiplinan, sikap, dll
    $table->text('catatan')->nullable(); // Umpan balik/catatan akhir
    $table->enum('penilai', ['Guru', 'Industri']); // Asal penilai (Guru Pembimbing atau Pembimbing DUDI)
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
