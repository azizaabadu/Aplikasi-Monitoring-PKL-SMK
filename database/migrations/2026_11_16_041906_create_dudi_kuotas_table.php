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
        Schema::create('dudi_kuotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dudi_id')->constrained('dudis')->cascadeOnDelete();
            $table->foreignId('periode_pkl_id')->constrained('periode_pkl')->cascadeOnDelete();
            $table->unsignedInteger('kuota');
            $table->timestamps();

            $table->unique(['dudi_id', 'periode_pkl_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dudi_kuotas');
    }
};
