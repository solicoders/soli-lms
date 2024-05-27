<?php

namespace App\Models\GestionRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionRH\Formateur;

class Specialite extends Model
{
    use HasFactory;

    public function Formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
}
