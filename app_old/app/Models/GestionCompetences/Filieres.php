<?php

namespace App\Models\GestionCompetences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionCompetences\Competences;

class Filieres extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function module()
    {
        return $this->hasMany(Modules::class);
    }
}
