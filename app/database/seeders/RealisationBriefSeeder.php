<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RealisationBriefProjet\{
    LivrableRealisationTableSeeder,

    RealisationBriefProjetTableSeeder,
    

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
