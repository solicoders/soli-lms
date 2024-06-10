<?php
namespace App\Exports\pkg_formations;

use App\Models\pkg_formations\Formation;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormationsExport implements FromCollection
{
    public function collection()
    {
        return Formation::all();
    }
}
