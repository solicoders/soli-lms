<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description', 'noteMin', 'noteMax'
    ];

    public function niveauCompetence()
    {
        return $this->belongsTo(NiveauCompetence::class);
    }

    public function formateurs()
    {
        return $this->hasMany(Formateur::class);
    }

    public function validations()
    {
        return $this->hasMany(Validation::class);
    }
}
