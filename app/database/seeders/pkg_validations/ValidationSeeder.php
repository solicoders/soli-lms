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
        $firstline = true;
while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Validation::create([
                    'note' => $data[0],
                    'transfert_competence_id' => $data[1],
                    'appreciation_id' => $data[2],
                    'realisation_projet_id' => $data[3]
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
