<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisationBriefProjet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'brief_projet_id',
        'livrable_realisations_id',
        'etat_realisationst_id',
        'affectation_competences_id',
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function brief_projet()
    {
        return $this->hasMany(BriefProjet::class);
    }
    public function livrable_realisations()
    {
        return $this->hasMany(LivrableRealisation::class);
    }
    public function etat_realisationst()
    {
        return $this->hasMany(EtatRealisationst::class);
    }
    public function affectation_competences()
    {
        return $this->hasMany(AffectationCompetence::class);
    }
    
}
