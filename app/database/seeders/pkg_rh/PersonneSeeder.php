<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Personne;
use App\Models\User;
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
            $date_inscription = $data['11'] == 'NULL' ? null : $data['11'];
            $nivaeu_scholaire_id = $data['15'] == 'NULL' ? null : $data['15'];
            $lieu_naissance_id = $data['16'] == 'NULL' ? null : $data['16'];
            $groupe_id = $data['17'] == 'NULL' ? null : $data['17'];
            $cne = $data['10'] == 'NULL' ? null : $data['17'];

            if (!$firstline) {
                $user = User::create([
                    "email"=>$data['4'],
                    'password' => Hash::make($data['5']),
                    "remember_token"=>$data['13'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
                Personne::create([
                    "prenom"=>$data['0'],
                    "nom"=>$data['1'],
                    "nom_arab"=>$data['2'],
                    "prenom_arab"=>$data['3'],
                    "type"=>$data['5'],
                    "date_naissance"=>$data['6'],
                    "tele_num"=>$data['7'],
                    "rue"=>$data['8'],
                    "cin"=>$data['9'],
                    "cne"=>$cne,
                    "date_inscription"=>$date_inscription,
                    "profile_image"=>$data['12'],
                    "ville_id"=>$data['14'],
                    "nivaeu_scholaire_id"=>$nivaeu_scholaire_id,
                    "lieu_naissance_id"=>$lieu_naissance_id,
                    "groupe_id"=>$groupe_id,
                    "user_id" => $user->id,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            }
            $firstline = false;
        }
    }
}
