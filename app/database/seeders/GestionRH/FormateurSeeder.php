<?php

namespace Database\Seeders\GestionRH;

use App\Models\GestionRH\Apprenant;
use App\Models\GestionRH\Formateur;
use App\Models\GestionRH\Personnel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FormateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'prenom' => 'Fouad',
            'nom' => 'Essseraje',
            'nom_arab' => 'Fouad',
            'prenom_arab' => 'Fouad',
            'date_naissance' => '1988/10/17',
            'tele_num' => '010414141814',
            'rue' => 'tanger',
            'ville_id' => 1,
            'cin' => 'kl487787',
            'profile_image' => 'default_profile_image.png',
            'remember_token' => '40hfg44q444gUGU4y56guyg5uG45HQGQE4IAY5584',
            'type'=> 'Formateure',
            'email' => 'Formateure@gmail.com',
            'password' => Hash::make('Formateure'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        $Personnel = Personnel::create([
            'matricule' => 'fs56df',
            'grade_id'=> 1,
            'specialite_id' => 1,
            'etablissement_id' => 1,
            'user_id' => $user1->id,
        ]);

        Formateur::create([
            'personnel_id' => $Personnel->id
        ]);


    }
}
