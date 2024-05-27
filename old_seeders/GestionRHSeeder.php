<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GestionRH\ApprenantSeeder;
use Database\Seeders\GestionRH\FormateurSeeder;
use Database\Seeders\GestionRH\Ville;

class GestionRHSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(GestionRHSeeder::Classes());
    }
    

    public static function Classes(): array
    {
        return [
            Ville::class,
            ApprenantSeeder::class,
            FormateurSeeder::class,
        ];
    }
}
