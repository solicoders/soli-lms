<?php

namespace Database\Seeders\pkg_validations;
use App\Models\pkg_validations\Validation; // Ensure you have the Validation model created
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValidationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Validation::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_validations/validations.csv"), "r");
        $firstLine = true;
        while (($data = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
            if (!$firstLine) {
                // Check if the transfert_competence_id exists in the transfert_competences table
                $transfertCompetence = \App\Models\pkg_creation_projets\TransfertCompetence::find($data[2]);
                if ($transfertCompetence) {
                    Validation::create([
                        'note' => $data[1],
                        'transfert_competence_id' => $data[2],
                        'appreciation_id' => $data[3],
                        'realisation_projet_id' => $data[4]
                    ]);
                }
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
