<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RealisationBriefProjet\{
<<<<<<<< HEAD:app/database/seeders/RealisationBriefSeeder.php
    LivrableRealisationTableSeeder,

    RealisationBriefProjetTableSeeder,
    
========
    LivrableRealisationSeeder,
    RealisationBriefSeeder,

 
>>>>>>>> develop:app_old/database/seeders/RealisationBriefProjetSeeder.php

};

class RealisationBriefProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(RealisationBriefProjetSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            LivrableRealisationTableSeeder::class,

            RealisationBriefProjetTableSeeder::class,
 
        ];
    }
}
