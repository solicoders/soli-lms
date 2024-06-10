<?php

namespace App\Exceptions\CreationBriefProjet;

use Exception;

class BriefProjetAlreadyExistException extends Exception
{
    public static function createBriefProjet()
    {
        return new static('Brief Projet already exist');
    }
}