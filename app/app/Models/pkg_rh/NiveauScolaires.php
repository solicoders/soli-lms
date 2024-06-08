<?php

namespace App\Models\pkg_rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauScolaires extends Model
{
    use HasFactory;
<<<<<<< HEAD

    public function Apprenant(){
        return $this->hasMany(Apprenant::class);
    }

    protected $fillable = ['nom'] ;
=======
>>>>>>> 2f111a44 (up)
}
