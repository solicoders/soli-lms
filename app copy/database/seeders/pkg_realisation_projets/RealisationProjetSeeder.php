<?php

namespace Database\Seeders\pkg_realisation_projets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\pkg_realisation_projets\RealisationProjet;
use Carbon\Carbon;

class RealisationProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pkg_realisation_projets/realisation_projets.csv"), "r");
        $firstLine = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstLine) {
                RealisationProjet::create([
                    'date_debut_realisation' => $data[0],
                    'date_fin_realisation' => $data[1],
                    'projet_id' => $data[2],
                    'etat_realisation_projet_id' => $data[3],
                    'personne_id' => $data[4],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}