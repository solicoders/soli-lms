<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Personne;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pkg_rh/personne.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Personne::create([
                    "prenom"=>$data['0'],
                    "nom"=>$data['1'],
                    "nom_arab"=>$data['2'],
                    "prenom_arab"=>$data['3'],
                    "email"=>$data['4'],
                    "type"=>$data['5'],
                    "date_naissance"=>$data['6'],
                    "tele_num"=>$data['7'],
                    "rue"=>$data['8'],
                    "cin"=>$data['9'],
                    "cne"=>$data['10'],
                    "date_inscription"=>$data['11'],
                    "profile_image"=>$data['12'],
                    "remember_token"=>$data['13'],
                    "ville_id"=>$data['14'],
                    "nivaeu_scholaire_id"=>$data['15'],
                    "lieu_naissance_id"=>$data['16'],
                    "groupe_id"=>$data['17'],
                    'password' => Hash::make($data['5']),
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            }
            $firstline = false;
        }
    }
}
