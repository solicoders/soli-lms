<?php

namespace Database\Seeders\pkg_formations;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pkg_formations\Categorie;

class categorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pkg_formations/categorie.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Categorie::create([
                    "nom"=>$data['0']
                ]);
            }
            $firstline = false;
        }
    }
}
