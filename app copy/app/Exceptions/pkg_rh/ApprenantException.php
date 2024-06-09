<?php

namespace App\Exceptions\pkg_rh;

use Exception;

class ApprenantException extends Exception
{
    public static function AlreadyExistApprenant()
    {
        return new self('Apprenant deja exist');
    }
}
