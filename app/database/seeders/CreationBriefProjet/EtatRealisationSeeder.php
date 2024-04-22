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
            'nom' => 'Design Completed',
            'description' => 'Completed the design phase with approval from the client',
            'brief_projet_id' => 1,
        ]);
    }
}
