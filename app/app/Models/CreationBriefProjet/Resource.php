<?php

namespace App\Models\CreationBriefProjet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'lien','nature', 'brief_projet_id'];

    public function briefProjet()
    {
        return $this->belongsTo(BriefProjet::class);
    }
}
php artisan make:exception CreationBriefProjet/BriefProjetAlreadyExistException
php artisan make:exception CreationBriefProjet/AffectationCompetenceAlreadyExistException
php artisan make:exception CreationBriefProjet/EtatRealisationAlreadyExistException
php artisan make:exception CreationBriefProjet/LivrableAlreadyExistException
php artisan make:exception CreationBriefProjet/ResourceAlreadyExistException
