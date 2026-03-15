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
        // Ensure the password column can store bcrypt hashes (60+ chars)
        Schema::table('lietotaji', function (Blueprint $table) {
            // Use raw statement to avoid requiring doctrine/dbal.
            
        });

        \Illuminate\Support\Facades\DB::statement(
            'ALTER TABLE `lietotaji` MODIFY `parole` VARCHAR(255) NOT NULL'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to a shorter column length (if needed).
        \Illuminate\Support\Facades\DB::statement(
            'ALTER TABLE `lietotaji` MODIFY `parole` VARCHAR(45) NOT NULL'
        );
    }
};
