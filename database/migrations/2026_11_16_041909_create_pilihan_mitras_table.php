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
        Schema::create('pilihan_mitras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->cascadeOnDelete();
            $table->foreignId('periode_pkl_id')->constrained('periode_pkl')->cascadeOnDelete();
            $table->foreignId('dudi_id')->constrained('dudis')->restrictOnDelete();
            $table->unsignedTinyInteger('prioritas');
            $table->timestamps();

            $table->unique(['siswa_id', 'periode_pkl_id', 'dudi_id']);
            $table->unique(['siswa_id', 'periode_pkl_id', 'prioritas']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihan_mitras');
    }
};
