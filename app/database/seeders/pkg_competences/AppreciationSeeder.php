<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_competences\Appreciation;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AppreciationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Appreciation::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/Appreciation.csv"), "r");
        $firstline = true;
        $i = 0;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Appreciation::create([
                    "nom" => $data['0'],
                    "description" => $data['1'],
                    "noteMin" => $data['2'],
                    "noteMax" => $data['3'],
                    'niveau_competence_id' => $data[4],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        
    }
}
