<?php

namespace App\Models\GestionCompetences;

use Illuminate\Database\Seeder;
use App\Models\GestionCompetences\Filieres;

class FilieresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Filieres::create(
        [
            'Nom' => 'Développeur Web – mode Bootcamp',
            'Description' => 'Le développeur web réalise l’ensemble des fonctionnalités techniques d’une application web',

        ],
        [
            'Nom' => 'Développeur Mobile – mode Bootcamp',
            'Description' => 'Le développeur mobile effectue la réalisation technique et le développement informatique d’applications mobiles.',
        ]);


    }
}
