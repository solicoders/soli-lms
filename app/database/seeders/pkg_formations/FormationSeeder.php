<?php

namespace Database\Seeders\pkg_formations;

use App\Models\pkg_formations\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FormationSeeder extends Seeder
{
  public function run(): void{Schema::disableForeignKeyConstraints();Formation::truncate();Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_formations/formations.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Formation::create([
                    'nom' => $data[0],
                    'description' => $data[1],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
