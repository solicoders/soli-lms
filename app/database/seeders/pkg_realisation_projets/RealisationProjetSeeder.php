<?php

namespace Database\Seeders\pkg_realisation_projets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealisationProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = Reader::createFromPath(database_path('seeders/data/pkg_realisation_projets/realisation_projets.csv'), 'r');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $records = $csv->getRecords(); //get all the records

        foreach ($records as $record) {
            DB::table('realisation_projets')->insert([
                'date_debut_realisation' => $record['date_debut_realisation'],
                'date_fin_realisation' => $record['date_fin_realisation'],
                'projet_id' => $record['projet_id'],
                'etat_realisation_projet_id' => $record['etat_realisation_projet_id'],
                'personne_id' => $record['personne_id'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    }

