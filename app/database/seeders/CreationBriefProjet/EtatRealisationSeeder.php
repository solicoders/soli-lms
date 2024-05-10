<?php

namespace Database\Seeders\CreationBriefProjet;

use App\Models\CreationBriefProjet\EtatRealisation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtatRealisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtatRealisation::create([
            'nom' => 'Terminé',
            'description' => 'Phase de conception terminée avec approbation du client',
            'brief_projet_id' => 1,
            'nature' => 'realisation'
        ]);
        EtatRealisation::create([
            'nom' => 'Validé',
            'description' => 'Phase de développement terminée avec approbation du client',
            'brief_projet_id' => 1,
            'nature' => 'validation'
        ]);
    }
}
