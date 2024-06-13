<?php

namespace App\Models\pkg_rh;

use App\Models\pkg_rh\Personne;
use App\Models\User;
use App\Traits\MorphType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Apprenant extends Personne
{
    protected $fillable = [
        'nom',
        'prenom',
        'nom_arab',
        'prenom_arab',
        'profile_image',
        'date_naissance',
        'tele_num',
        'rue',
        'ville_id',
        'user_id',
        'cin',
        'groupe_id',
        'cne',
        'niveau_scolaire_id',
        'lieu_naissance_id',
        '_token'
    ];
    public function realisationProjets() {
        return $this->hasMany(RealisationProjet::class, 'personne_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
