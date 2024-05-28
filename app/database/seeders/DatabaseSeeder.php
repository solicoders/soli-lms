<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(pkg_authentificationSeeder::class);
        $this->call(pkg_rhSeeder::class);
        $this->call(pkg_competencesSeeder::class);
        $this->call(pkg_creation_projetsSeeder::class);
        $this->call(pkg_realisation_projetsSeeder::class);
        $this->call(pkg_creation_tacheSeeder::class);
        $this->call(pkg_realisation_tacheSeeder::class);
        $this->call(pkg_validationsSeeder::class);
        $this->call(pkg_formationsSeeder::class);
    }
}
