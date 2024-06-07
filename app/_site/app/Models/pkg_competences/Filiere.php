<?php

namespace App\Models\pkg_competences;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

   
    protected $table = 'filiere';

    protected $fillable = [
        'nom',
        'description',
    ];

    public function module()
    {
        return $this->hasMany(Module::class);
    }
}
