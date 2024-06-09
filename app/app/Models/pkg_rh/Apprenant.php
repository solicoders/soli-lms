<?php

namespace App\Models\pkg_rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_rh\Personne;
use App\Traits\MorphType;


class Apprenant extends Personne
{
    protected $table = 'personnes';
    use HasFactory, MorphType;
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

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

    public function niveauScolaire(){
        return $this->belongsTo(NiveauScolaires::class);
    }

    public function Ville(){
        return $this->belongsTo(Ville::class);
    }
    
}
