<?php

namespace App\Imports\pkg_creation_projets;

use App\Models\pkg_rh\Apprenant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ApprenantImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Apprenant([
            'nom_arab' => $row["nom_arab"],
            'prenom_arab' => $row["prenom_arab"],
            'date_naissance' => $row["date_naissance"],
            'tele_num' => $row["tele_num"],
            'rue' => $row["rue"],
            'ville_id' => $row["ville_id"],
            'cin' => $row["cin"],
            'groupe_id' => $row["groupe_id"],
            'cne' => $row["cne"],
            'specialite_id' => $row["specialite_id"],
            'niveau_scolaire_id' => $row["niveau_scolaire_id"],
            'lieu_naissance_id' => $row["lieu_naissance_id"],
        ]);
    }
}
