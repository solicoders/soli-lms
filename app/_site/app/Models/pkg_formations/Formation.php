<?php

namespace App\Models\pkg_formations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'lien',
        'formateur_id',
    ];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
}
