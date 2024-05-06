<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GestionRH\ApprenantSeeder;
use Database\Seeders\GestionRH\FormateurSeeder;
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
            ApprenantSeeder::class,
            FormateurSeeder::class,
        ];
    }
}
