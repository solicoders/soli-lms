<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\pkg_authentification\{
    RoleSeeder,
    UserSeeder,
};

class pkg_authentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(pkg_authentificationSeeder::Classes());
    }
    public static function Classes(): array
    {
        return [
            RoleSeeder::class,
            UserSeeder::class,
            
        ];
    }
}
