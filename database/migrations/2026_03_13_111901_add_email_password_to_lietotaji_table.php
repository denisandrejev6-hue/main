<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // This migration is meant to ensure authentication columns exist in the legacy `lietotaji` table.
        // Some rows may already have empty strings in `epasts`, so we normalize them to NULL before applying a UNIQUE index.

        DB::statement("ALTER TABLE `lietotaji` ADD COLUMN IF NOT EXISTS `epasts` VARCHAR(255) NULL");
        DB::statement("ALTER TABLE `lietotaji` ADD COLUMN IF NOT EXISTS `parole` VARCHAR(255) NULL");
        DB::statement("ALTER TABLE `lietotaji` ADD COLUMN IF NOT EXISTS `remember_token` VARCHAR(100) NULL");

        // Normalize empty strings to NULL so unique index can be applied cleanly.
        DB::statement("UPDATE `lietotaji` SET `epasts` = NULL WHERE `epasts` = ''");

        // Add unique index on epasts if it does not exist.
        try {
            DB::statement("ALTER TABLE `lietotaji` ADD UNIQUE INDEX `lietotaji_epasts_unique` (`epasts`)");
        } catch (\Throwable $e) {
            // ignore if index exists
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This down() is best-effort; it may fail if the columns do not exist.
        DB::statement("ALTER TABLE `lietotaji` DROP INDEX IF EXISTS `lietotaji_epasts_unique`");
        DB::statement("ALTER TABLE `lietotaji` DROP COLUMN IF EXISTS `epasts`");
        DB::statement("ALTER TABLE `lietotaji` DROP COLUMN IF EXISTS `parole`");
        DB::statement("ALTER TABLE `lietotaji` DROP COLUMN IF EXISTS `remember_token`");
    }
};
