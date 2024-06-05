<?php

namespace App\Models\pkg_formations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    protected $table = 'formateurs';

    protected $fillable = [
        'nom',

    ];
}
