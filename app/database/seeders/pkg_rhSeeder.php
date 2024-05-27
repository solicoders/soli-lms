<?php

namespace Database\Seeders;

use Database\Seeders\pkg_rh\VilleSeeder;
use Database\Seeders\pkg_rh\SpecialiteSeeder;
use Database\Seeders\pkg_rh\NiveauScholaireSeeder;
use Database\Seeders\pkg_rh\GroupeSeeder;
use Database\Seeders\pkg_rh\PersonneSeeder;
use Database\Seeders\pkg_rh\FormateurSeeder;
use Database\Seeders\pkg_rh\ApprenantSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pkg_rhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return [
            VilleSeeder::class,
            SpecialiteSeeder::class,
            NiveauScholaireSeeder::class,
            GroupeSeeder::class,
            PersonneSeeder::class,
            FormateurSeeder::class,
            ApprenantSeeder::class,
        ];
    }
}
