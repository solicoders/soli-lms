<?php

namespace App\Exceptions\pkg_creation_projets;

use Exception;

class ResourceAlreadyExistException extends Exception
{
    public static function createResource()
    {
        return new self(__('pkg_creation_projets/message.createResourceException'));
    }
}
