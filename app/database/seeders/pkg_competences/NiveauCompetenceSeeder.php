<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_autorisations\Role;
use App\Models\pkg_competences\NiveauCompetence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class NiveauCompetenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        NiveauCompetence::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/NiveauCompetences.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                NiveauCompetence::create([
                    "nom" => $data['0'],
                    "description" => $data['1'],
                    "competence_id" => $data['2'],
                ]);
            }
            $firstline = false;
        }


        fclose($csvFile);
    }

}
