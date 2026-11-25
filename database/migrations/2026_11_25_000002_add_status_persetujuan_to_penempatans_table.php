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
        Schema::table('penempatans', function (Blueprint $table) {
            if (!Schema::hasColumn('penempatans', 'status')) {
                $table->string('status')->default('disetujui')->after('ditetapkan_oleh');
            }
            if (!Schema::hasColumn('penempatans', 'disetujui_pada')) {
                $table->timestamp('disetujui_pada')->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penempatans', function (Blueprint $table) {
            $table->dropColumn(['status', 'disetujui_pada']);
        });
    }
};
