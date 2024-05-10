<?php

namespace App\Models\GestionCompetences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionCompetences\competences;

class niveaux extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'competence_id',
    ];

    public function competences()
    {
        return $this->belongsTo(competences::class);
    }
}
