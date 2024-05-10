<?php

namespace Database\Seeders\GestionCompetences;

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

        $filieres = [
            [
                'nom' => 'Développeur Web – mode Bootcamp',
                'description' => 'Le développeur web réalise l’ensemble des fonctionnalités techniques d’une application web',
            ],
            [
                'nom' => 'Développeur Mobile – mode Bootcamp',
                'description' => 'Le développeur mobile effectue la réalisation technique et le développement informatique d’applications mobiles.',
            ]
        ];


        foreach ($filieres as $filiere) {
            Filieres::create($filiere);
        }
    }
}
