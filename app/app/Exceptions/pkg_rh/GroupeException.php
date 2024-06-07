<?php

namespace App\Exceptions\pkg_rh;

use Exception;

class GroupeException extends Exception
{
    public static function AlreadyExistGroupe()
    {
        return new self('Groupe deja exist');
    }
}
