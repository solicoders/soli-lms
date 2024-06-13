<?php

namespace App\Models\pkg_formations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_formations\Categorie; 

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'lien',
        'lien1', 
        'categorie_id' 
    ];

    /**
     * Relation vers la catégorie associée à cette formation.
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id'); // Assurez-vous que la clé étrangère correspond à votre structure de base de données
    }


}
