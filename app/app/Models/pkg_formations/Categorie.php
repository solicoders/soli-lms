<?php

namespace App\Models\pkg_formations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categorie'; 
    protected $fillable = ['nom'];
}
