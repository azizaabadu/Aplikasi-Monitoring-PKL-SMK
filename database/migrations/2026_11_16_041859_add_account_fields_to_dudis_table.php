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
        Schema::table('dudis', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->unique()->constrained()->nullOnDelete();
            $table->boolean('aktif')->default(true)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dudis', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn('aktif');
        });
    }
};
