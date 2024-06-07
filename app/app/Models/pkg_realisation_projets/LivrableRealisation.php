<?php

namespace App\Models\pkg_realisation_projets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivrableRealisation extends Model
{
    use HasFactory;

    protected $table = 'livrable_realisations';

    protected $fillable = [
        'nom',
        'description',
        'lien',
        'realisation_projet_id'
    ];

    public function realisationProjet()
    {
        return $this->belongsTo(RealisationProjet::class);
    }

}