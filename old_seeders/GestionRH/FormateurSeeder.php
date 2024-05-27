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

class FormateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/GestionRH/formateur.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                $user = User::create([
                    "prenom"=>$data['0'],
                    "nom"=>$data['1'],
                    "nom_arab"=>$data['2'],
                    "prenom_arab"=>$data['3'],
                    "date_naissance"=>$data['4'],
                    "tele_num"=>$data['5'],
                    "rue"=>$data['6'],
                    "ville_id"=>$data['7'],
                    "role_id"=>$data['8'],
                    "cin"=>$data['9'],
                    "profile_image"=>$data['10'],
                    "remember_token"=>$data['11'],
                    "email"=>$data['12'],
                    'password' => Hash::make('Formateur'),
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
                Formateur::create([
                    'user_id' => $user->id,
                    'specialite_id' => 1,
                ]);
            }
            $firstline = false;
        }




    }
}
