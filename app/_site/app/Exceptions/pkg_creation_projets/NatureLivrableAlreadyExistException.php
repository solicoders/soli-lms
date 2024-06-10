<?php

namespace App\Exceptions\pkg_creation_projets;

use Exception;

class NatureLivrableAlreadyExistException extends Exception
{
    public static function createNatureLivrable()
    {
        return new self(__('pkg_creation_projets/message.createNatureLivrableException'));
    }}
