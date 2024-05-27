<?php

namespace App\Models\GestionRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Formateur extends Model
{
    public $timestamps = false;
    protected $table = 'formateur';

    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
