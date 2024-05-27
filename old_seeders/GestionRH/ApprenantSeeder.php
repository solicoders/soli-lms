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

class ApprenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/GestionRH/apprenant.csv"), "r");
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
                    'password' => Hash::make('Apprenant'),
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
                Apprenant::create([
                    'nivaeu_scholaire_id' => $data['13'],
                    'cne'=> $data['14'],
                    'lieu_naissance_id' => $data['15'],
                    'date_inscription' => $data['16'],
                    'user_id' => $user->id
                ]);
            }
            $firstline = false;
        }
    }
}
