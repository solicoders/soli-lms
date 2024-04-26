<?php

namespace Database\Seeders\RealisationBriefProjet;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivrableRealisationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('livrable_realisations')->insert([
            'nom' => 'Sample Name',
            'description' => 'Sample Description',
            'lien' => 'http://example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
