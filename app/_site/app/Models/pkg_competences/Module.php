<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_competences\Competence;
use App\Models\pkg_competences\Filiere;
class Module extends Model
{
    use HasFactory;

    protected $table = 'module';

    protected $fillable = [
        'N',
        'nom',
        'description',
        'filiere_id',
    ];
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
    public function competences()
    {
        return $this->hasMany(Competence::class);
    }

}
