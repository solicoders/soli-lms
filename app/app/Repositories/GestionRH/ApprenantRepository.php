<?php

namespace App\Repositories\GestionRH;

use App\Models\GestionRH\Apprenant;
use App\Repositories\BaseRepository;



class ApprenantRepository extends BaseRepository
{
    protected $model;

    public function __construct(Apprenant $apprenant)
    {
        $this->model = $apprenant;
    }

}