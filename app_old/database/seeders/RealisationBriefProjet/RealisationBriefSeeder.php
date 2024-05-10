<?php

namespace Database\Seeders\RealisationBriefProjet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealisationBriefProjetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('realisation_brief_projets')->insert([
            'user_id' => 1,
            'brief_projet_id' => 1,
            'livrable_realisations_id' => 1,
            'etat_realisations_id' => 1,
            'affectation_competences_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}