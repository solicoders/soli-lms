<?php

namespace App\Exceptions\pkg_rh;

use Exception;

class NiveauScolaireException extends Exception
{
    public static function AlreadyExistNiveauScolaire()
    {
        return new self('Niveau Scolaire deja exist');
    }
}
