<?php

namespace App\Exceptions\GestionFormations;

use Exception;

class FormationAlreadyExistException extends Exception
{
    public static function createFormation()
    {
        return new self(__('GestionFormations/message.createFormationException'));
    }}
