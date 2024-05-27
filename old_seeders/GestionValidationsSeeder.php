<?php

namespace Database\Seeders;

use Database\Seeders\GestionValidations\NiveaucompetenceformateurSeeder;
use Database\Seeders\GestionValidations\ValidationSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class GestionValidationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(GestionValidationsSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            NiveaucompetenceformateurSeeder::class,
            ValidationSeeder::class,
        ];
    }
}
