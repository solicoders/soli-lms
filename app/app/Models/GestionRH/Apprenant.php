<?php

namespace App\Models\GestionRH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Apprenant extends Model
{
    use HasFactory;
    protected $table = 'apprenant';

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
