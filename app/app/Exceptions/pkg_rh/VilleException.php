<?php

namespace App\Exceptions\pkg_rh;

use Exception;

class VilleException extends Exception
{
    public static function AlreadyExistVille()
    {
        return new self('Ville deja exist');
    }
}
