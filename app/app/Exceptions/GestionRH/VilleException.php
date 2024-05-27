<?php

namespace App\Exceptions\GestionRH;

use Exception;

class VilleException extends Exception
{
    public static function AlreadyExistVille()
    {
        return new self(__('GestionRH/message.alreadyexistville'));
    }
}
