<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\pkg_creation_tache\{
    TacheSeeder,
};

class pkg_creation_tacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(pkg_creation_tacheSeeder::Classes());
    }
    public static function Classes(): array
    {
        return [
            TacheSeeder::class,
        ];
    }
}
