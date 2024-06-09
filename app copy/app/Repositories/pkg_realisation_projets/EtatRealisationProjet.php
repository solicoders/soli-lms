<?php

namespace App\Repositories\pkg_realisation_projets;

use App\Models\pkg_realisation_projets\EtatRealisationProjet;
use App\Repositories\BaseRepository;

class EtatRealisationProjetRepository extends BaseRepository
{
    protected $model;

    public function __construct(EtatRealisationProjet $etatRealisationProjet)
    {
        $this->model = $etatRealisationProjet;
    }

    // Add specific methods for EtatRealisationProjet here
}