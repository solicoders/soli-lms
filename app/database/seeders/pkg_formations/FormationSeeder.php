<?php

namespace Database\Seeders\pkg_formations;

use App\Models\pkg_formations\Formation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        // Désactiver temporairement les contraintes de clé étrangère pour permettre la suppression et la réinsertion des données
        Schema::disableForeignKeyConstraints();

        // Supprimer toutes les données existantes de la table "formations"
        Formation::truncate();

        // Réactiver les contraintes de clé étrangère
        Schema::enableForeignKeyConstraints();

        // Ouvrir le fichier CSV
        $csvFile = fopen(base_path("database/data/pkg_formations/formations.csv"), "r");

        // Ignorer la première ligne (en-têtes)
        fgetcsv($csvFile);

        // Lire chaque ligne du fichier CSV et insérer les données dans la base de données
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            // Vérifier si toutes les colonnes attendues sont présentes
            if (count($data) !== 3) {
                continue; // Passer à la ligne suivante si le nombre de colonnes est incorrect
            }

            // Insérer la formation dans la base de données
            Formation::create([
                'nom' => $data[0],
                'description' => $data[1],
                'lien' => $data[2],
            ]);
        }

        // Fermer le fichier CSV
        fclose($csvFile);
    }
}
