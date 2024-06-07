<?php

namespace Database\Seeders\pkg_formations;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\pkg_formations\Formateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FormateursTableSeeder extends Seeder
{
    public function run(): void{Schema::disableForeignKeyConstraints();Formateur::truncate();Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_formations/formateurs.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Formateur::create([
                    'nom' => $data[0]
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
