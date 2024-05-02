<?php

namespace App\Models\GestionRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Personel extends User
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'grade_id',
        'specialite_id',
        'etablissement_id',
    ];
}
