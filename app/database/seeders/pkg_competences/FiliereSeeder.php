<?php

namespace Database\Seeders\pkg_competences;

use App\Models\pkg_competences\Filiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key constraints to avoid issues during truncation
        Schema::disableForeignKeyConstraints();
        Filiere::truncate();
        Schema::enableForeignKeyConstraints();

        // Open the CSV file
        $csvFilePath = base_path("database/data/pkg_competences/Filiere.csv");
        if (!file_exists($csvFilePath) || !is_readable($csvFilePath)) {
            throw new \Exception("CSV file does not exist or is not readable: $csvFilePath");
        }

        $csvFile = fopen($csvFilePath, "r");
        if ($csvFile === false) {
            throw new \Exception("Failed to open CSV file: $csvFilePath");
        }

        // Read and insert data from CSV file
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Filiere::create([
                    "nom" => $data[0],
                    "description" => $data[1],
                ]);
            }
            $firstline = false;
        }

        // Close the CSV file
        fclose($csvFile);
    }
}


// ==========================================================
        // =========== Add Seeder Permission Assign Role ============
        // ==========================================================
        $responsablerRole = User::RESPONSABLE;
        $Role = Role::where('name', $responsableRole)->first();
        $csvFile = fopen(base_path("database/data/pkg_competences/CompetencePermission.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            if (!$firstline) {
                Permission::create([
                    "name" => $data['0'],
                    "guard_name" => $data['1'],
                ]);

                if ($Role) {
                    // If the role exists, update its permissions
                    $Role->givePermissionTo($data['0']);
                } else {
                    // If the role doesn't exist, create it and give permissions
                    $Role = Role::create([
                        'name' => $responsablerRole,
                        'guard_name' => 'web',
                    ]);
                    $Role->givePermissionTo($data['0']);
                }
            }
            $firstline = false;
        }
        fclose($csvFile);
