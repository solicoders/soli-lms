<?php

namespace App\Models\CreationBriefProjet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BriefProjet extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'description', 'travail_a_faire', 'critere_de_validation', 'date_debut', 'date_fin','formateur_id'
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function affectationCompetences()
    {
        return $this->hasMany(AffectationCompetence::class);
    }

    public function etatRealisations()
    {
        return $this->hasMany(EtatRealisation::class);
    }

    public function livrables()
    {
        return $this->hasMany(Livrable::class);
    }
}
