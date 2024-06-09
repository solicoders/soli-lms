<?php

namespace App\Models\pkg_rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_rh\Personne;
use App\Traits\MorphType;

class Formateur extends Personne
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
        'cin',
        'groupe_id',
        'specialite_id',
        'lieu_naissance_id',
        '_token'
    ];
    public function specialite(){
        return $this->belongsTo(Specialite::class);
    }

    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

    public function Ville(){
        return $this->belongsTo(Ville::class);
    }
}
