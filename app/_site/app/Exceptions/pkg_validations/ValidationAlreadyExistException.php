<?php

namespace App\Exceptions\pkg_validations;

use Exception;

class ValidationAlreadyExistException extends Exception
{
    public static function createValidation()
    {
        return new self('The validation is already exists.');
    }
}
