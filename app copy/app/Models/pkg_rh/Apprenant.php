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
    
    public function groupe(){
        return $this->belongsTo(Groupe::class);
    }

    public function niveauScholaire(){
        return $this->belongsTo(NiveauScholaires::class);
    }

    public function Ville(){
        return $this->belongsTo(Ville::class);
    }
}
