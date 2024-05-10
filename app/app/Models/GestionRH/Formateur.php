<?php

namespace App\Models\GestionRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionRH\Personel;
use App\Models\User;

class Formateur extends Model
{
    
    protected $table = 'formateur';

    use HasFactory;

    public function Personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
