<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'nom', 'description'
    ];

    public function niveauxCompetence()
    {
        return $this->hasMany(NiveauCompetence::class);
    }

    public function technologiques()
    {
        return $this->hasMany(Technologie::class);
    }
}
