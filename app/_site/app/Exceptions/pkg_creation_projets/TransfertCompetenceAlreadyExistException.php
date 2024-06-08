<?php

namespace App\Exceptions\pkg_creation_projets;

use Exception;

class TransfertCompetenceAlreadyExistException extends Exception
{
    public static function createTransfertCompetence()
    {
        return new self(__('pkg_creation_projets/message.createTransfertCompetenceException'));
    }
}
