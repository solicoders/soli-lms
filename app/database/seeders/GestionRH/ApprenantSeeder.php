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
        $user1 = User::create([
            'prenom' => 'reda',
            'nom' => 'grain',
            'nom_arab' => 'reda',
            'prenom_arab' => 'reda',
            'date_naissance' => '2003/10/17',
            'tele_num' => '010414141814',
            'rue' => 'tanger',
            'ville_id' => 2,
            'role_id' => 1,
            'cin' => 'kl447787',
            'profile_image' => 'default_profile_image.png',
            'remember_token' => '40hfg44q444gUGU4y56guyg5uG45HQGQE4IAY5584',
            'email' => 'apprenant@gmail.com',
            'password' => Hash::make('apprenant'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Apprenant::create([
            'nivaeu_scholaire_id' => 1,
            'cne'=> 'P145555575',
            'lieu_naissance_id' => 1,
            'date_inscription' => '2023/10/14',
            'user_id' => $user1->id
        ]);


    }
}
