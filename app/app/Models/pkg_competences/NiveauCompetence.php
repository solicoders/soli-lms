<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauCompetence extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description','competence_id'
    ];

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function appreciations()
    {
        return $this->hasMany(Appreciation::class);
    }
}
