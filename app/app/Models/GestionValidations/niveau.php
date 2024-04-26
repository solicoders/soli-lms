<?php

namespace App\Models\GestionValidations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'note_max', 'note_min'];

    public function validation()
    {
        return $this->hasOne(Validation::class);
    }
}
