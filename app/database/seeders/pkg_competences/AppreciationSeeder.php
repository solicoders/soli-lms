<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_competences\Appreciation;
<<<<<<< HEAD
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

=======
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
>>>>>>> 209b0cdf6bac7548ff9c1acc2494f7d7b70fa32e

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

<<<<<<< HEAD
        $csvFile = fopen(base_path("database/data/pkg_competences/Appreciation.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Appreciation::create([
                    "nom" => $data['0'],
                    "description" => $data['1'],
                    "noteMin" => $data['2'],
                    "noteMax" => $data['3'],
=======
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
>>>>>>> 209b0cdf6bac7548ff9c1acc2494f7d7b70fa32e
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
