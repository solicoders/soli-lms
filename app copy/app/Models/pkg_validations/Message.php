<?php

namespace App\Models\pkg_validations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    protected $fillable = [
        'titre',
        'description',
        'validation_id',
    ];

    public function validation()
    {
        return $this->belongsTo(Validation::class);
    }
}
