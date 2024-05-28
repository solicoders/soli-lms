<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description', 'categorie_technologie_id'
    ];

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function categorieTechnologie()
    {
        return $this->belongsTo(CategorieTechnologie::class);
    }
}
