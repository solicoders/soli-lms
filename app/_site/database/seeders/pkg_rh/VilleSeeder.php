<?php

namespace Database\Seeders\pkg_rh;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pkg_rh\Ville as Pkg_rhVille;
use Carbon\Carbon;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/pkg_rh/ville.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Pkg_rhVille::create([
                    "nom"=>$data['0'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            }
            $firstline = false;
        }
    }
}
