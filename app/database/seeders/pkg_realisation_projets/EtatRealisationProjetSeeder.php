<?php

namespace Database\Seeders\pkg_realisation_projets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\pkg_realisation_projets\EtatRealisationProjet;
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

        $csvFile = fopen(base_path("database/data/pkg_realisation_projets/etat_realisation_projets.csv"), "r");                $firstLine = true;
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
