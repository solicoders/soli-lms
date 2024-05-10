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