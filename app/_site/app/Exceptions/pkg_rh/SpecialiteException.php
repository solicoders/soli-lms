<?php

namespace App\Exceptions\pkg_rh;

use Exception;

class SpecialiteException extends Exception
{
    public static function AlreadyExistSpecialite()
    {
        return new self('Specialite deja exist');
    }
}
