<?php

namespace App\Models\pkg_creation_projets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NatureLivrable extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description'
    ];

    public function livrables()
    {
        return $this->hasMany(Livrable::class);
    }
}
