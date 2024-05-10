<?php

namespace App\Models\GestionRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Personnel extends User
{
    use HasFactory;
    protected $table = 'personnel';

    protected $fillable = [
        'matricule',
        'grade_id',
        'specialite_id',
        'etablissement_id',
    ];

    public function Formateur()
    {
        return $this->hasMany(Formateur::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
