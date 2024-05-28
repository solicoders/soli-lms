<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\pkg_creation_projets\{
LivrableSeeder,
NatureLivrableSeeder,
ProjetSeeder,
ResourceSeeder,
TransfertCompetenceSeeder,
};

class pkg_creation_projetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $this->call(pkg_creation_projetsSeeder::Classes());
    }
    public static function Classes(): array
    {
        return [
            ProjetSeeder::class,
            NatureLivrableSeeder::class,
            LivrableSeeder::class,
            ResourceSeeder::class,
            TransfertCompetenceSeeder::class,
        ];
    }
}
