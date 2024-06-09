<?php

namespace Database\Seeders\pkg_competences;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\pkg_competences\Competence;
use Illuminate\Support\Facades\Schema;


class CompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Competence::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/competences.csv"), "r");
        if ($csvFile === false) {
            throw new \Exception("Could not open the CSV file.");
        }

        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Competence::create([
                    "code" => $data[0],
                    "nom" => $data[1],
                    "description" => $data[2],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
