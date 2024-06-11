<?php

namespace App\Exceptions\pkg_creation_projets;

use Exception;

class LivrableAlreadyExistException extends Exception
{
    public static function createLivrable()
    {
        return new self(__('pkg_creation_projets/message.createLivrableException'));
    }
}
