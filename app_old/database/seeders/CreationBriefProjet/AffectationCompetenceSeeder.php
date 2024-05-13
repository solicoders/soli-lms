<?php

namespace Database\Seeders\CreationBriefProjet;

use App\Models\CreationBriefProjet\AffectationCompetence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AffectationCompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AffectationCompetence::create([
            'brief_projet_id' => 1,
        ]);    }
}
