<?php

namespace App\Exceptions\pkg_rh;

use Exception;

class FormateureException extends Exception
{
    public static function AlreadyExistFormateure()
    {
        return new self('Formateure deja exist');
    }
}
