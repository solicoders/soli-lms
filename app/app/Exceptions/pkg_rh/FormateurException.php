<?php

namespace App\Exceptions\pkg_rh;

use Exception;

class FormateurException extends Exception
{
    public static function AlreadyExistFormateur()
    {
        return new self('Formateur deja exist');
    }
}
