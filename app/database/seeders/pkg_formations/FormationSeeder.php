<?php

namespace Database\Seeders\pkg_formations;

use App\Models\pkg_formations\Formation;
use App\Models\pkg_formations\Formateur; // Import du modèle Formateur
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Formation::truncate();

        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_formations/formations.csv"), "r");

        fgetcsv($csvFile);
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (count($data) !== 3) {
                continue;
            }

            // Insérer la formation dans la base de données
            Formation::create([
                'nom' => $data[0],
                'description' => $data[1],
                'lien' => $data[2],
                'formateur_id' => Formateur::inRandomOrder()->first()->id, 
            ]);
        }

        fclose($csvFile);
    }
}
