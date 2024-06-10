<?php
// app/Imports/FormationsImport.php

namespace App\Imports\pkg_formations;

use App\Models\pkg_formations\Formation;
use Maatwebsite\Excel\Concerns\ToModel;


class FormationsImport implements ToModel
{
    public function model(array $row)
    {
        return new Formation([
            'nom' => $row[0],
            'description' => $row[1],
            'lien' => $row[2],
           
        ]);
    }
}
