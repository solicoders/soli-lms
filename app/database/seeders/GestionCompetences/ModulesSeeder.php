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
            [
            'N' => 'M01',
            'nom' => 'Communication écrite et orale',
            'description' => 'Ce module permettra au stagiaire de développer son expression, sa
            communication orale et écrite tout en consolidant ses connaissances à l’aide de
            situations rencontrées dans la vie courante et le monde du travail. Le choix des
            textes et des activités l’amènera à renforcer son esprit critique, son autonomie et
            sa capacité de travailler en équipe.
            En outre, ce module offre au stagiaire les moyens de renforcer l’efficacité de sa
            communication son assurance et la maîtrise de situation de communication
            diverses spécifiques au milieu professionnel.',
            'masse_horaire' => '30 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M02',
            'nom' => 'Anglais technique',
            'description' => 'L’objectif de ce module est de faire acquérir les connaissances devant permettre au
            stagiaire de pouvoir suivre une conversation de base en anglais, lire et comprendre et
            interpréter des documents techniques en anglais informatique.',
            'masse_horaire' => '30 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M02',
            'nom' => 'Culture d’entreprenariat',
            'description' => 'L’esprit d’entreprise favorise l’innovation, la croissance et la prospérité aux quatre coins
            du monde et contribue à transformer le paysage économique et social.
            L’entrepreunariat basé sur les technologies peut favoriser la création de solutions
            innovantes et d’opportunités commerciales permettant de relever des défis, de
            s’accomplir personnellement, d’assurer la réussite de l’entreprise et d’aider à la création
            d’emplois qui encouragent la croissance durable des économies locales.',
            'masse_horaire' => '30 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M03',
            'nom' => 'Compétences comportementales et sociales',
            'description' => 'Ce module permettra au stagiaire d’acquérir des aptitudes à résoudre des
            problèmes, à respecter la hiérarchie et avoir l’esprit d’équipe. Ces compétences
            correspondent à des aptitudes que chacun de nous possède de façon plus ou moins
            consciente comme la créativité, la gestion du stress, la confiance en soi, l’esprit
            d’entreprise et la responsabilité ou encore l’empathie. S’entraîner à les identifier, les
            développer et à les mobiliser ouvre de nouvelles perspectives dans un monde de
            travail en plein bouleversement. Même dans les situations les plus imprévues ou
            déstabilisantes, les soft skills permettent d’adoucir le quotidien professionnel tout
            en optimisant l’efficacité au poste de travail.
            Ainsi, le module soft skills offre au stagiaire les moyens d’optimiser de sa
            communication son assurance et la maîtrise de situations professionnelles diverses.',
            'masse_horaire' => '45 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M04',
            'nom' => 'Initiation à l’environnement du développement web',
            'description' => 'La prairie est le premier temps de la formation où les apprenants prennent leurs marques.
            Elle permet à la fois pour eux de prendre les bonnes habitudes professionnelles, de favoriser
            la cohésion, le travail en groupe. Mais aussi de les préparer aux méthodes et spécificités
            d’une formation Simplon, à l’apprentissage par l’action en s’initiant aux différents sujets qui
            seront abordés en profondeur par la suite.
            Enfin, c’est aussi un temps nécessaire pour attaquer la formation, en découvrir les objectifs,
            gagner confiance en soi, et initier sa réflexion d’insertion professionnelle.',
            'masse_horaire' => '70 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M05',
            'nom' => 'Maquettage et UX/UI d’un projet d’application web',
            'description' => 'Ce module permettra à l’apprenant de maîtriser :
            ● Les wireframes et le maquettage de son site web
            ● La mise en œuvre de la démarche UX dans une équipe projet
            ● Le processus d’itération UX',
            'masse_horaire' => '70 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M06',
            'nom' => 'Gestion de projet',
            'description' => 'Ce module permettra à l’apprenant de maîtriser :
            ● Scrum, Kanban techniques de réunions, Lean startup
            ● Communiquer clairement avec des collaborateurs dans le cadre d’un projet',
            'masse_horaire' => '80 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M07',
            'nom' => 'Intégration front-end d’un projet d’application web',
            'description' => 'Ce module permettra à l’apprenant de maîtriser :
            ● Intégration de la structure des pages en HTML
            ● Mise en forme des pages avec CSS
            ● Développement d’une interface utilisateur web dynamique à l’aide d’un Framework
            Javascript
            ● Versionnement du code source avec Git
            ● Prise en compte des règles d’accessibilité',
            'masse_horaire' => '210 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M08',
            'nom' => 'Développement back-end d’un projet d’application web',
            'description' => 'Ce module permettra à l’apprenant de maîtriser :
            ● La programmation des fonctionnalités côté serveur
            ● La modélisation UML
            ● La création de base de données
            ● Le développement de la gestion des données et des accès à la base de données
            ● La mise en oeuvre des tests unitaires et d’intégration
            ● La sécurisation des applications web
            ● Le versionnement des sources avec Git',
            'masse_horaire' => '165 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M09',
            'nom' => 'Réalisation d’une application web avec un CMS',
            'description' => 'Ce module permettra à l’apprenant de maîtriser :
            ● L’utilisation de WordPress
            ● La création d’application web sur WordPress
            ● La sécurisation avec WordPress
            ● Le déploiement avec Wordpress
            ● L’utilisation de Magento
            ● La création d’une application de e-commerce sur Magento
            ● La sécurisation avec Magento
            ● Le déploiement avec Magento',
            'masse_horaire' => '120 hours',
             'filiere_id' => 1,
            ],
            [
            'N' => 'M10',
            'nom' => 'Veille et adaptation aux technologies de l’entreprise',
            'description' => 'Ce module permettra à l’apprenant de maîtriser :
            ● La recherche et la qualification des sources d’informations
            ● L’utilisation d’outils d’agrégation',
            'masse_horaire' => '80 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M11',
            'nom' => 'Projet de fin de formation',
            'description' => 'L’objectif de ce module vise à ce que le stagiaire conçoive et développe une application
            de synthèse en utilisant les méthodes d’analyse et les logiciels appropriés.
            En plus de permettre à l’étudiant d’approfondir des notions sur la planification des
            activités, la gestion du temps, le travail collaboratif en équipe, la réalisation d’un
            prototype évolutif et la conception de différents biens livrables, ce projet vise
            l’intégration des notions apprises dans plusieurs cours de la formation.
            Enfin, les connaissances acquises dans les modules de communication s’avèrent fort
            utiles pour la production de rapport d’activité et la promotion de l’application.',
            'masse_horaire' => '120 hours',
            'filiere_id' => 1,
            ],
            [
            'N' => 'M12',
            'nom' => 'Stage en entreprise',
            'description' => 'Le stage vise la mise en pratique des capacités développées chez les apprenants dans le
            milieu professionnel.',
            'masse_horaire' => '120 hours',
            'filiere_id' => 1,
            ],

        ];

        foreach ($modules as $module) {
            Modules::create($module);
        }
    }
}
