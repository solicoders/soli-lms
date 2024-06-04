<?php

namespace App\Models\pkg_realisation_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_rh\Personne;

class RealisationProjet extends Model
{
    use HasFactory;

    protected $table = 'realisation_projets';

    protected $fillable = [
        'date_debut_realisation',
        'date_fin_realisation',
        'projet_id',
        'etat_realisation_projet_id',
        'personne_id'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function etatRealisationProjet()
    {
        return $this->belongsTo(EtatRealisationProjet::class);
    }

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    public function livrableRealisations()
    {
        return $this->hasMany(LivrableRealisation::class, 'realisation_projet_id');
    }
}
