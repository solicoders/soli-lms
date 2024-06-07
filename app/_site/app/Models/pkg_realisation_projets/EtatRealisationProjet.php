<?php

namespace App\Models\pkg_realisation_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatRealisationProjet extends Model
{
    use HasFactory;

    protected $table = 'etat_realisation_projets';

    protected $fillable = [
        'etat'
    ];

    public function realisationProjets()
    {
        return $this->hasMany(RealisationProjet::class, 'etat_realisation_projet_id');
    }
}