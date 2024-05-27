<?php

namespace App\Repositories\CreationBriefProjet;

use App\Models\CreationBriefProjet\BriefProjet;
use App\Repositories\BaseRepositorie;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\CreationBriefProjet\BriefProjetAlreadyExistException;
use App\Models\CreationBriefProjet\Livrable;
use App\Models\GestionCompetences\Competences;

class LiverableRepository extends BaseRepositorie
{
    protected $liverable;

    public function __construct(Livrable $liverable)
    {
        $this->liverable = $liverable;
    }
}
