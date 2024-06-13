<?php

namespace App\Exceptions\GestionFormations;

use Exception;

class CategorieAlreadyExistException extends Exception
{
    public static function createCategorie()
    {
        return new self(__('GestionFormations/message.createCategorieException'));
    }
}
