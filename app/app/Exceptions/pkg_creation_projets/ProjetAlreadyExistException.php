<?php

namespace App\Exceptions\pkg_creation_projets;

use Exception;

class ProjetAlreadyExistException extends BusinessException
{
    public static function createProject()
    {
        return new self(__('pkg_creation_projets/message.createProjectException'));
    }}
