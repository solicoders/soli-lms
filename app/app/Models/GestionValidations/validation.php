<?php

namespace App\Models\GestionValidations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validation extends Model
{
    use HasFactory;

    protected $fillable = ['note'];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }
}
