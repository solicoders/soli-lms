<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieTechnologie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'description'
    ];

    public function technologies()
    {
        return $this->hasMany(Technologie::class);
    }
}
