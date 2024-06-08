<?php

namespace App\Models\pkg_creation_projets;

use App\Models\pkg_competences\Technologie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologieCompetence extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'transfert_competence_id', 'technologie_id',
    ];

    public function transfertCompetence()
    {
        return $this->belongsTo(TransfertCompetence::class, 'transfert_competence_id');
    }

    public function technologie()
    {
        return $this->belongsTo(Technologie::class, 'technologie_id');
    }
}
