<?php

namespace App\Models\pkg_creation_projets;

use App\Models\pkg_realisation_projets\LivrableRealisation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livrable extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'lien', 'description', 'projet_id', 'nature_livrable_id'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function natureLivrable()
    {
        return $this->belongsTo(NatureLivrable::class);
    }

    public function livrableRealisations()
    {
        return $this->hasMany(LivrableRealisation::class);
    }
}
