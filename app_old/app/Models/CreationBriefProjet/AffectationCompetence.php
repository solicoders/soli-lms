<?php

namespace App\Models\CreationBriefProjet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffectationCompetence extends Model
{
    use HasFactory;
    protected $fillable = ['brief_projet_id'];

    public function briefProjet()
    {
        return $this->belongsTo(BriefProjet::class);
    }
}
