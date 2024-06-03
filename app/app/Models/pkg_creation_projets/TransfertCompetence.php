<?php

namespace App\Models\pkg_creation_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransfertCompetence extends Model
{
    use HasFactory;
    protected $fillable = [
        'projet_id', 'competence_id', 'appreciation_id'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function appreciation()
    {
        return $this->belongsTo(Appreciation::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technologie::class);
    }

    public function validations()
    {
        return $this->hasMany(Validation::class);
    }
}
