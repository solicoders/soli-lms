<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GestionRH\UserSeeder;
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
            UserSeeder::class,
        ];
    }
}
