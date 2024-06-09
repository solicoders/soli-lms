<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\pkg_realisation_tache\{
EtatRealisationTacheSeeder,
RealisationTacheSeeder,
};

class pkg_realisation_tacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(pkg_realisation_tacheSeeder::Classes());
    }
    public static function Classes(): array
    {
        return [
            EtatRealisationTacheSeeder::class,
            RealisationTacheSeeder::class,
        ];
    }
}
