<?php

namespace App\Imports\CreationBriefProjet;

use Carbon\Carbon;
use App\Models\CreationBriefProjet\BriefProjet;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BriefProjetImport implements ToModel, WithHeadingRow
{
    // Implement the method to check if a briefprojet already exists in the application
    private function briefprojetExists(array $row): bool
    {
        // Logic to check if a briefprojet with the same attributes exists in the database
        // For example, you can check if a briefprojet with the same name and dates already exists
        $existingBriefProjet = BriefProjet::where('titre', $row['titre'])
            ->where('date_debut', $row['date_debut'])
            ->where('date_de_fin', $row['date_de_fin'])
            ->exists();
        return $existingBriefProjet;
    }

    // Implement the model() method to import briefprojets
    public function model(array $row)
    {
        // Check if the briefprojet already exists in the application
        if ($this->briefprojetExists($row)) {
            // Task already exists, skip importing it
            return null;
        }

        // Task doesn't exist, proceed with importing it
        return new BriefProjet([
            'titre' => $row["titre"],
            'description' => $row["description"],
            'travail_a_faire' => $row["travail_a_faire"],
            'critere_de_validation' => $row["critere_de_validation"],
            'date_debut' => $row["date_debut"],
            'date_de_fin' => $row["date_de_fin"],
            'formateur_id' => $row["formateur_id"]

        ]);
    }

    // Implement the validate() method to validate row data (as shown in your original code)
    // ...
}