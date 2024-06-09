<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\pkg_realisation_projets\{
    LivrableRealisationSeeder,
    RealisationProjetSeeder,
    EtatRealisationProjetSeeder,
};

class pkg_realisation_projetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(pkg_realisation_projetsSeeder::Classes());
    }
    public static function Classes(): array
    {
        return [
            EtatRealisationProjetSeeder::class,
            RealisationProjetSeeder::class,
            LivrableRealisationSeeder::class,
        ];
    }
}
