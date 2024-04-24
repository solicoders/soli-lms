<?php

namespace App\Models\GestionCompetences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionCompetences\Competences; 

class Modules extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom',
        'Description'
    ];

    public function competences()
    {
        return $this->hasMany(Competences::class);
    }
}
