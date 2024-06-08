<?php

namespace App\Models\pkg_rh;

use App\Traits\MorphType;
use App\Models\pkg_rh\Personne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formateur extends Personne
{
    protected $table = 'personnes';
    use HasFactory, MorphType;

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
