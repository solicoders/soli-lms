<?php

namespace Database\Seeders\pkg_realisation_projets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtatRealisationProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        EtatRealisationProjet::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_realisation_projets/etat-realisation-projet.csv"), "r");
        $firstLine = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstLine) {
                EtatRealisationProjet::create([
                    'etat' => $data[0]
                ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
