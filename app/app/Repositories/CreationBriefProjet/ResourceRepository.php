<?php

namespace App\Repositories\CreationBriefProjet;

use App\Models\CreationBriefProjet\BriefProjet;
use App\Repositories\BaseRepositorie;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\CreationBriefProjet\BriefProjetAlreadyExistException;
use App\Models\CreationBriefProjet\Resource;
use App\Models\GestionCompetences\Competences;

class ResourceRepository extends BaseRepositorie
{
    protected $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }
}
