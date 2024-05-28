<?php

namespace Database\Seeders\pkg_competences;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use App\Models\pkg_competences\Technologie;
use App\Models\pkg_notifications\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class TechnologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ==========================================================
        // ================= Add Seeder Technologies ================
        // ==========================================================
        Schema::disableForeignKeyConstraints();
        Technologie::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = fopen(base_path("database/data/pkg_competences/technologies/Technologies.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Technologie::create([
                    "nom" => $data['0'],
                    "description" => $data['1'],
                    "categorie_technologies_id" => $data['2'],
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
