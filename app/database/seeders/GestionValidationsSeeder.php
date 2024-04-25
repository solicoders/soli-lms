<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GestionValidations\{

};

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
 
        ];
    }
}
