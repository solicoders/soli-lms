<?php

namespace Database\Seeders\pkg_creation_projets;

use App\Models\pkg_creation_projets\Livrable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LivrableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Livrable::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_creation_projets/Livrables.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Livrable::create([
                    'titre' => $data[0],
                    'lien' => $data[1],
                    'description' => $data[2],
                    'projet_id' => $data[3],
                    'nature_livrable_id' => $data[4],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
