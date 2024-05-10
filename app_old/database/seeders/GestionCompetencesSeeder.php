<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GestionCompetences\{
    FilieresSeeder,
    ModulesTableSeeder,
    CompetencesSeeder,
};

class GestionCompetencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(GestionCompetencesSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            FilieresSeeder::class,
            ModulesTableSeeder::class,
            CompetencesSeeder::class,
        ];
    }
}
