<?php

namespace App\Models\GestionCompetences;

use Illuminate\Database\Seeder;
use App\Models\GestionCompetences\Modules;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'Nom' => 'Communication écrite et orale',
                'Description' => '',
                'Masse_horaire' => '30 hours',
            ],
            [
                'Nom' => 'Anglais technique',
                'Description' => '',
                'Masse_horaire' => '30 hours',
            ],
            [
                'Nom' => 'Culture d\'entreprenariat',
                'Description' => '',
                'Masse_horaire' => '30 hours',
            ],
            [
                'Nom' => 'Compétences comportementales et sociales (Soft Skills)',
                'Description' => '',
                'Masse_horaire' => '30 hours',
            ],
            [
                'Nom' => 'Initiation à l’environnement du développement mobile par
                la pédagogie active',
                'Description' => '',
                'Masse_horaire' => '70 hours',
            ],
            [
                'Nom' => 'Maquettage d’une application mobile',
                'Description' => '',
                'Masse_horaire' => '50 hours',
            ],
            [
                'Nom' => 'Gestion de projet',
                'Description' => '',
                'Masse_horaire' => '50 hours',
            ],
            [
                'Nom' => 'Manipulation d’une base de données',
                'Description' => '',
                'Masse_horaire' => '80 hours',
            ],
            [
                'Nom' => 'Développement de la partie back-end',
                'Description' => '',
                'Masse_horaire' => '160 hours',
            ],
            [
                'Nom' => 'Développement d’une application mobile',
                'Description' => '',
                'Masse_horaire' => '225 hours',
            ],
            [
                'Nom' => 'Déploiement d’une application web et d’une application
                mobile',
                'Description' => '',
                'Masse_horaire' => '100 hours',
            ],
            [
                'Nom' => 'Veille et d’adaptation aux technologies de l’entreprise.',
                'Description' => '',
                'Masse_horaire' => '60 hours',
            ],
            [
                'Nom' => 'Projet de fin de formation',
                'Description' => '',
                'Masse_horaire' => '120 hours',
            ],
            [
                'Nom' => 'Stage en entreprise',
                'Description' => '',
                'Masse_horaire' => '120 hours',
            ],
        ];

        foreach ($modules as $module) {
            Modules::create($module);
        }
    }
}
