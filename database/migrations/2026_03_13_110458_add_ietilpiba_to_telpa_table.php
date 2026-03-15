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
        Schema::table('telpa', function (Blueprint $table) {
            if (!Schema::hasColumn('telpa', 'ietilpiba')) {
                $table->integer('ietilpiba')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('telpa', function (Blueprint $table) {
            if (Schema::hasColumn('telpa', 'ietilpiba')) {
                $table->dropColumn('ietilpiba');
            }
        });
    }
};
