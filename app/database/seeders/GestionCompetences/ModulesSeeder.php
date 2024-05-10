<?php

namespace Database\Seeders\GestionCompetences;

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

            'N' => 'M01',
            'nom' => 'Communication écrite et orale',
            'description' => 'Ce module vise à développer les compétences en communication écrite et orale des étudiants.',
            'masse_horaire' => '30 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M02',
            'nom' => 'Anglais technique',
            'description' => 'Ce module vise à améliorer les compétences en anglais technique des étudiants.',
            'masse_horaire' => '30 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M03',
            'nom' => 'Culture d\'entreprenariat',
            'description' => 'Ce module vise à sensibiliser les étudiants à la culture d\'entreprenariat et à développer leurs compétences en la matière.',
            'masse_horaire' => '30 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M04',
            'nom' => 'Compétences comportementales et sociales (Soft Skills)',
            'description' => 'Ce module vise à développer les compétences comportementales et sociales des étudiants.',
            'masse_horaire' => '30 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M05',
            'nom' => 'Initiation à l’environnement du développement mobile par la pédagogie active',
            'description' => 'Ce module vise à initier les étudiants à l\'environnement du développement mobile en utilisant la pédagogie active.',
            'masse_horaire' => '70 hours',
            'filiere_id' => 2,
            ],
            [
            'N' => 'M06',
            'nom' => 'Maquettage d’une application mobile',
            'description' => 'Ce module vise à enseigner aux étudiants les techniques de maquettage d\'une application mobile.',
            'masse_horaire' => '50 hours',
            'filiere_id' => 2,
            ],
            [
            'N' => 'M07',
            'nom' => 'Gestion de projet',
            'description' => 'Ce module vise à former les étudiants à la gestion de projet.',
            'masse_horaire' => '50 hours',
            'filiere_id' => 2,
            ],
            [
            'N' => 'M08',
            'nom' => 'Manipulation d’une base de données',
            'description' => 'Ce module vise à enseigner aux étudiants les techniques de manipulation d\'une base de données.',
            'masse_horaire' => '80 hours',
            'filiere_id' => 2,
            ],
            [
            'N' => 'M09',
            'nom' => 'Développement de la partie back-end',
            'description' => 'Ce module vise à former les étudiants au développement de la partie back-end d\'une application.',
            'masse_horaire' => '160 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M01',
            'nom' => 'Développement d’une application mobile',
            'description' => 'Ce module vise à former les étudiants au développement d\'une application mobile.',
            'masse_horaire' => '225 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M10',
            'nom' => 'Déploiement d’une application web et d’une application mobile',
            'description' => 'Ce module vise à enseigner aux étudiants les techniques de déploiement d\'une application web et d\'une application mobile.',
            'masse_horaire' => '100 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M11',
            'nom' => 'Veille et d’adaptation aux technologies de l’entreprise.',
            'description' => 'Ce module vise à former les étudiants à la veille et à l\'adaptation aux technologies de l\'entreprise.',
            'masse_horaire' => '60 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M12',
            'nom' => 'Projet de fin de formation',
            'description' => 'Ce module vise à permettre aux étudiants de réaliser un projet de fin de formation.',
            'masse_horaire' => '120 hours',
            'filiere_id' => 2,
            ],
            [
            'N' => 'M13',
            'nom' => 'Stage en entreprise',
            'description' => 'Ce module vise à permettre aux étudiants de réaliser un stage en entreprise.',
            'masse_horaire' => '120 hours',
            'filiere_id' => 2,
            ],
        ];

        foreach ($modules as $module) {
            Modules::create($module);
        }
    }
}
