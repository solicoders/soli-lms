<?php

namespace App\Models\pkg_rh;

use App\Traits\MorphType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personne extends Model
{
    use HasFactory,MorphType;
}
