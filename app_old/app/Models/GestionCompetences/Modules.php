<?php

namespace App\Models\GestionCompetences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionCompetences\Competences;
use App\Models\GestionCompetences\Filieres;
class Modules extends Model
{
    use HasFactory;

    protected $fillable = [
        'N',
        'nom',
        'description',
        'filiere_id',
    ];
    public function filieres()
    {
        return $this->belongsTo(Filieres::class);
    }
    public function competences()
    {
        return $this->hasMany(Competences::class);
    }

}
