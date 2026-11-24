<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orang_tuas', function (Blueprint $table): void {
            $table->index('user_id');
            $table->dropUnique('orang_tuas_user_id_unique');
        });
    }

    public function down(): void
    {
        Schema::table('orang_tuas', function (Blueprint $table): void {
            $table->unique('user_id');
            $table->dropIndex('orang_tuas_user_id_index');
        });
    }
};
