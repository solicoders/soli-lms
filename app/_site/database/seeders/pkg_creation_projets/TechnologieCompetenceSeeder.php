<?php

namespace Database\Seeders\pkg_creation_projets;

use App\Models\pkg_creation_projets\TechnologieCompetence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TechnologieCompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        TechnologieCompetence::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_creation_projets/TechnologieCompetence.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                TechnologieCompetence::create([
                    'technologie_id' => $data[0],
                    'transfert_competence_id' => $data[1],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

