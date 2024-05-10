<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\CreationBriefProjet\{
AffectationCompetenceSeeder,
 BriefProjetSeeder,
 EtatRealisationSeeder,
 LivrableSeeder,
 ResourceSeeder,

};

class CreationBriefProjetSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CreationBriefProjetSeeder::Classes());
    }
    

    public static function Classes(): array
    {
        return [
            BriefProjetSeeder::class,
            AffectationCompetenceSeeder::class,
            EtatRealisationSeeder::class,
            LivrableSeeder::class,
            ResourceSeeder::class,
        ];
    }
}
