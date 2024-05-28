<?php

namespace Database\Seeders\GestionRH;

use App\Models\GestionRH\Apprenant;
use App\Models\GestionRH\Formateur;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     User::create([
    //         'prenom' => 'hussein',
    //         'nom' => 'bouik',
    //         'type'=> 'Apprenant',
    //         'email' => 'apprenant@gmail.com',
    //         'password' => Hash::make('apprenant'),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),

    //     ] );  

    //     User::create([
    //         'prenom' => 'Formateur',
    //         'nom' => 'madani',
    //         'type'=> 'Formateur',
    //         'email' => 'formateur@gmail.com',
    //         'password' => Hash::make('formateur'),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ]);  

    //     User::create([
    //         'prenom' => 'admin',
    //         'nom' => 'admin',
    //         'type'=> 'admin',
    //         'email' => 'admin@gmail.com',
    //         'password' => Hash::make('admin'),
    //         'created_at' => Carbon::now(),
    //         'updated_at' => Carbon::now(),
    //     ]);
    // }
}