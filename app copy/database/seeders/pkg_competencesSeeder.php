<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\pkg_competences\{
AppreciationSeeder,
CategorieTechnologieSeeder,
CompetenceSeeder,
NiveauCompetenceSeeder,
TechnologieSeeder,
ModuleSeeder,
FiliereSeeder,
};

class pkg_competencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $this->call(pkg_competencesSeeder::Classes());
    }
    public static function Classes(): array
    {
        return [
            CompetenceSeeder::class,
            NiveauCompetenceSeeder::class,
            FiliereSeeder::class,
            ModuleSeeder::class,
            AppreciationSeeder::class,
            CategorieTechnologieSeeder::class,
            TechnologieSeeder::class,
        ];
    }
}
