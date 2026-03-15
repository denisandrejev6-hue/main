<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lietotajs;

class LietotajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lietotajs::create([
            'vards' => 'Admin User',
            'epasts' => 'admin@example.com',
            'parole' => bcrypt('password'),
            'loma' => 'Admin',
        ]);

        Lietotajs::create([
            'vards' => 'Darbinieks User',
            'epasts' => 'darbinieks@example.com',
            'parole' => bcrypt('password'),
            'loma' => 'Darbinieks',
        ]);

        Lietotajs::create([
            'vards' => 'Lietotajs User',
            'epasts' => 'lietotajs@example.com',
            'parole' => bcrypt('password'),
            'loma' => 'Lietotajs',
        ]);
    }
}