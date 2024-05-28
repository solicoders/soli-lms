<?php

namespace Database\Seeders\pkg_creation_projets;

use App\Models\pkg_creation_projets\Projet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Projet::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_creation_projets/Projets.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Projet::create([
                    'titre' => $data[0],
                    'description' => $data[1],
                    'travailAFaire' => $data[2],
                    'critereDeTravail' => $data[3],
                    'dateDebut' => $data[4],
                    'dateFin' => $data[5],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
