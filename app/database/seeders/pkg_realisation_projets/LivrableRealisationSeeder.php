<?php

namespace Database\Seeders\pkg_realisation_projets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class LivrableRealisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the CSV document from a file path
        $csv = Reader::createFromPath(database_path('seeders/data/livrable_realisations.csv'), 'r');
        $csv->setHeaderOffset(0); // Set the CSV header offset

        $records = $csv->getRecords(); // Get all the records

        foreach ($records as $record) {
            DB::table('livrable_realisations')->insert([
                'nom' => $record['nom'],
                'description' => $record['description'],
                'lien' => $record['lien'],
                'realisation_projet_id' => $record['realisation_projet_id'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
