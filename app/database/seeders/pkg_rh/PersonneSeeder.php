<?php

namespace Database\Seeders\pkg_rh;

use App\Models\pkg_rh\Personne;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles 
        $responsable = Role::create(['name' => User::RESPONSABLE]);
        Role::create(['name' => User::APPRENANT]);
        Role::create(['name' => User::FORMATEUR]);

        // Seed and Add Permissions to responsable and as well to Formateures And Apprenants
        $csvFile = fopen(base_path("database/data/pkg_rh/permissions.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                $existingPermission = Permission::where('name', $data['0'])->first();
                if (!$existingPermission) {
                    Permission::create(['name' => $data['0'], 'guard_name' => 'web']);
                }
                $responsable->givePermissionTo($data['0']);
            }
            $firstline = false;
        }

        // Seed to personnes model with users model 
        $csvFile = fopen(base_path("database/data/pkg_rh/personne.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            $cne = $data['10'] == 'NULL' ? null : $data['17'];
            $date_inscription = $data['11'] == 'NULL' ? null : $data['11'];
            $nivaeu_scholaire_id = $data['15'] == 'NULL' ? null : $data['15'];
            $lieu_naissance_id = $data['16'] == 'NULL' ? null : $data['16'];
            $groupe_id = $data['17'] == 'NULL' ? null : $data['17'];
            $specialite_id = $data['18'] == 'NULL' ? null : $data['18'];

            if (!$firstline) {
                $user = User::create([
                    "email"=>$data['4'],
                    'password' => Hash::make($data['5']),
                    "remember_token"=>$data['13'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);

                // $data['5'] has the type of user
                $user->assignRole($data['5']);

                // if ($data['5'] == 'formateur') {
                //     $user->assignRole(User::FORMATEUR);
                // }elseif ($data['5'] == 'apprenant') {
                //     $user->assignRole(User::APPRENANT);
                // }elseif ($data['5'] == 'responsable') {
                //     $user->assignRole(User::RESPONSABLE);
                // }

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
                    "niveau_scolaire_id"=>$nivaeu_scholaire_id,
                    "lieu_naissance_id"=>$lieu_naissance_id,
                    "groupe_id"=>$groupe_id,
                    "user_id" => $user->id,
                    "specialite_id" => $specialite_id,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            }
            $firstline = false;
        }

    }
}
