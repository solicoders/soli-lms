<?php

namespace App\Repositories\CreationBriefProjet;

use App\Models\CreationBriefProjet\BriefProjet;
use App\Repositories\BaseRepositorie;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\CreationBriefProjet\BriefProjetAlreadyExistException;
use App\Models\GestionCompetences\Competences;

class BriefProjetRepository extends BaseRepositorie
{
    protected $model;

    public function __construct(BriefProjet $briefprojet)
    {
        $this->model = $briefprojet;
    }
    public function create(array $data)
    {
        $titre = $data['titre'];

        $existingbriefprojet = BriefProjet::where('titre', $titre)->exists();

        if ($existingbriefprojet) {
            throw BriefProjetAlreadyExistException::createProject();
        } else {
            return parent::create($data);
        }
    }
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('titre', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
    public function filter()
    {
       return Competences::all();
    }

}
