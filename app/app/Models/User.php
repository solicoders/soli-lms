<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\GestionRH\Apprenant;
use App\Models\GestionRH\Formateur;
use App\Models\GestionRH\Ville;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    // protected $table = 'users';

    public const ADMIN = "admin";
    public const MEMBRE = "membre";
    public const RESPONSABLE_FORMATION = "responsable_formation";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'nom_arab',
        'prenom_arab',
        'cin',
        'date_naissance',
        'tele_num',
        'rue',
        'ville_id',
        'profile_image',
        'type',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function Apprenant()
    {
        return $this->hasMany(Apprenant::class);
    }

    public function Formateur()
    {
        return $this->hasMany(Formateur::class);
    }

    public function Ville()
    {
        return $this->hasMany(Ville::class);
    }
}