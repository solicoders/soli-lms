<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_competences\Appreciation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AppreciationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Appreciation::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFilePath = base_path("database/data/pkg_competences/Appreciation.csv");

        if (!file_exists($csvFilePath) || !is_readable($csvFilePath)) {
            throw new \Exception("CSV file does not exist or is not readable: {$csvFilePath}");
        }

        $csvFile = fopen($csvFilePath, 'r');
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== false) {
            if (!$firstline) {
                Appreciation::create([
                    'nom' => $data[0],
                    'description' => $data[1],
                    'noteMin' => $data[2],
                    'noteMax' => $data[3],
                    'niveau_competence_id' => $data[4],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
