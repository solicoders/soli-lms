<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RH\UserSeeder;
class RhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(RhSeeder::Classes());
    }
    

    public static function Classes(): array
    {
        return [
            UserSeeder::class,
        ];
    }
}
