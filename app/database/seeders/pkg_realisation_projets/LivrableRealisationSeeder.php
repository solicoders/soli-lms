<?php

namespace Database\Seeders\pkg_realisation_projets;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class LivrableRealisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('livrable_realisations')->truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_realisation_projets/livrable_realisations.csv"), "r");
        $firstLine = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstLine) {
                DB::table('livrable_realisations')->insert([
                    'nom' => $data[0],
                    'description' => $data[1],
                    'lien' => $data[2],
                    'realisation_projet_id' => $data[3],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}