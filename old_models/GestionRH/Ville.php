<?php

namespace App\Models\GestionRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ville extends Model
{
    protected $table = 'ville';
    protected $fillable = ['nom'];

    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
