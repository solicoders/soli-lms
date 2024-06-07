<?php

namespace App\Imports\pkg_creation_projets;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LivrableImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }
}
