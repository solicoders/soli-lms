<?php

namespace App\Models\pkg_creation_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom', 'lien', 'description', 'projet_id'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
