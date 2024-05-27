<?php

namespace App\Models\pkg_validations;
use App\Models\pkg_creation_projets\TransfertCompetence ;
use App\Models\pkg_realisation_projets\RealisationProjet;
use App\Models\pkg_competences\Appreciation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'transfert_competence_id',
        'appreciation_id',
        'realisation_projet_id',
    ];

    public function transfertCompetence()
    {
        return $this->belongsTo(TransfertCompetence::class);
    }

    public function appreciation()
    {
        return $this->belongsTo(Appreciation::class);
    }

    public function realisationProjet()
    {
        return $this->belongsTo(RealisationProjet::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
