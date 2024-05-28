<?php

namespace Database\Seeders\pkg_creation_projets;

use App\Models\pkg_creation_projets\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Resource::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_creation_projets/Resources.csv"), "r");
        $firstline = true;

        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Resource::create([
                    'nom' => $data[0],
                    'lien' => $data[1],
                    'description' => $data[2],
                    'projet_id' => $data[3],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
