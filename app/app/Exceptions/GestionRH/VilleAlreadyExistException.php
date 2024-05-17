<?php

namespace App\Exceptions\GestionRH;

use Exception;

class VilleAlreadyExistException extends Exception
{
    public static function createVille()
    {
        return new self(__('hello world'));
    }
}
