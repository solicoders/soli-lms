<?php

namespace App\Models\pkg_rh;

use App\Traits\MorphType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MorphType;

class Personne extends Model
{
    use HasFactory;
    use MorphType;
}
