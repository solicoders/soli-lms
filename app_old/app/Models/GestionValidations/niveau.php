<?php

namespace App\Models\GestionValidations;
use App\Models\GestionCompetences\Competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'note_max', 'note_min' , 'competence_id'];

    public function validation()
    {
        return $this->hasOne(Validation::class);
    }
    public function Competences()
    {
        return $this->belongsTo(Competences::class);
    }
}
