<?php

namespace Database\Seeders\RH;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert Formateur users
        DB::table('users')->insert([
            'nom' => 'Williams',
            'prenom' => 'David',
            'email' => 'david.williams@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'nom' => 'Brown',
            'prenom' => 'Sarah',
            'email' => 'sarah.brown@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);




        DB::table('users')->insert([
            'nom' => 'Williams',
            'prenom' => 'Liam',
            'email' => 'liam.williams@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'nom' => 'Will',
            'prenom' => 'Joseph',
            'email' => 'joseph.Will@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
     
    }
}
