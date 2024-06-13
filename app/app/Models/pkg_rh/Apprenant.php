<?php

namespace App\Models\pkg_rh;

use App\Models\pkg_rh\Personne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\pkg_realisation_projets\RealisationProjet;


class Apprenant extends Personne
{
    protected $fillable = [
        'nom',
        'prenom',
        // other fillable attributes...
    ];
    public function realisationProjets() {
        return $this->hasMany(RealisationProjet::class, 'personne_id');
    }
}
