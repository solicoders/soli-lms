<?php

namespace App\Repositories\GestionRH;

use App\Models\GestionRH\Personnel;
use App\Repositories\BaseRepository;



class PersonnelRepository extends BaseRepository
{
    protected $model;

    public function __construct(Personnel $personnel)
    {
        $this->model = $personnel;
    }

}