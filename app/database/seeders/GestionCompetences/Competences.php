<?php

namespace App\Models\GestionCompetences;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionCompetences\Competences;

class CompetencesSeeder extends Seeder
{
    public function run()
    {

        $Competences = [
            [
                'Code' => 'C1',
                'Nom' => 'Maquetter une application mobile',
                'Description' => 'Cette compétence vous permettra de concevoir des maquettes d\'applications mobiles, aidant ainsi à visualiser et à planifier l\'interface utilisateur',

            ],
            [
                'Code' => 'C2',
                'Nom' => 'Manipuler une base de données - perfectionnement',
                'Description' => 'Cette compétence vous permettra de maîtriser la manipulation avancée des bases de données, ce qui est essentiel pour stocker et gérer des informations',
            ],
            [
                'Code' => 'C3',
                'Nom' => 'Développer la partie back-end d\'une application web ou web mobile - perfectionnement',
                'Description' => 'Cette compétence vous permettra de créer et de gérer la logique côté serveur d\'applications web et mobiles avancées',
            ],
            [
                'Code' => 'C4',
                'Nom' => 'Collaborer à la gestion d\'un projet informatique et à l\'organisation de l\'environnement de développement - perfectionnement',
                'Description' => 'Cette compétence vous préparera à jouer un rôle essentiel dans la gestion de projets informatiques et l\'optimisation de l\'environnement de développement',
            ],
            [
                'Code' => 'C5',
                'Nom' => 'Développer une application mobile native, avec Android et React Native',
                'Description' => 'Cette compétence vous permettra de créer des applications mobiles performantes pour les plateformes Android et React Native',
            ],
            [
                'Code' => 'C6',
                'Nom' => 'Préparer et exécuter les plans de tests d\'une application',
                'Description' => 'Cette compétence vous aidera à élaborer des stratégies de test efficaces pour garantir la qualité des applications',
            ],
            [
                'Code' => 'C7',
                'Nom' => 'C7. Préparer et exécuter le déploiement d\'une application web et mobile - perfectionnement',
                'Description' => 'Cette compétence vous permettra de maîtriser le processus de déploiement d\'applications web et mobiles avancées',
            ]

        ];


        foreach ($Competences as $competence) {
            Competences::create($competence);
        }


    }
}
