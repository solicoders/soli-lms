<?php

namespace App\Repositories\pkg_realisation_projets;

use App\Models\pkg_realisation_projets\LivrableRealisation;
use App\Repositories\BaseRepository;

class LivrableRealisationRepository extends BaseRepository
{
    protected $model;

    public function __construct(LivrableRealisation $livrableRealisation)
    {
        $this->model = $livrableRealisation;
    }

}