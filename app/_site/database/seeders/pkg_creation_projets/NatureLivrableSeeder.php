<?php

namespace Database\Seeders\pkg_creation_projets;

use App\Models\pkg_creation_projets\NatureLivrable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NatureLivrableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        NatureLivrable::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_creation_projets/NatureLivrables.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                NatureLivrable::create([
                    'nom' => $data[0],
                    'description' => $data[1],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
