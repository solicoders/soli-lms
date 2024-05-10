<?php

namespace Database\Seeders\CreationBriefProjet;

use App\Models\CreationBriefProjet\BriefProjet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BriefProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BriefProjet::create([
            'titre' => 'Web Development Project',
            'description' => 'Develop a responsive website for a fictional company',
            'travail_a_faire' => 'Design, Front-end Development, Back-end Development, Testing',
            'critere_de_validation' => 'Mobile responsiveness, User-friendly interface, Functional links',
            'date_debut' => '2024-05-01',
            'date_fin' => '2024-06-30',
            'formateur_id' => 1,
        ]);    }
}
