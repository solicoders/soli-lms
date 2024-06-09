<?php

namespace Database\Seeders\pkg_formations;

use App\Models\pkg_formations\Apprenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class ApprenantsTableSeeder extends Seeder
{
    public function run(): void{Schema::disableForeignKeyConstraints();Apprenant::truncate();Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_formations/apprenants.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Apprenant::create([
                    'nom' => $data[0]
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
