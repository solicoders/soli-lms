<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\pkg_validations\{
MessageSeeder,
ValidationSeeder,
};

class pkg_validationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(pkg_validationsSeeder::Classes());
    }
    public static function Classes(): array
    {
        return [
            ValidationSeeder::class,
            MessageSeeder::class,
        ];
    }
}
