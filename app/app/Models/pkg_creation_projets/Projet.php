<?php

namespace App\Models\pkg_creation_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'travailAFaire', 'critereDeTravail', 'description', 'dateDebut', 'dateFin'
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function livrables()
    {
        return $this->hasMany(Livrable::class);
    }

    public function transfertCompetences()
    {
        return $this->hasMany(TransfertCompetence::class);
    }

    public function realisationProjets()
    {
        return $this->hasMany(RealisationProjet::class);
    }
}
