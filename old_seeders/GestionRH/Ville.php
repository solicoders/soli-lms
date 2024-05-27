<?php

namespace Database\Seeders\GestionRH;

use App\Models\GestionRH\Ville as GestionRHVille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Ville extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/GestionRH/ville.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                GestionRHVille::create([
                    "nom"=>$data['0'],
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now()
                ]);
            }
            $firstline = false;
        }
    }
}
