<?php

namespace App\Models\RealisationBriefProjet;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivrableRealisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'description',
        'date_debut',
        'date_fin',
        'cout',
        'realisation_brief_projet_id',
    ];
    public function realisation_brief_projet()
    {
        return $this->belongsTo(RealisationBriefProjet::class);
    }

}