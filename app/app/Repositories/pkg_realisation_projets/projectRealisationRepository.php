<?php

namespace App\Repositories\pkg_realisation_projets;

use App\Models\pkg_realisation_projets\RealisationProjet;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_realisation_projets\RealisationProjetAlreadyExistException;

/**
 * Classe RealisationProjetRepository qui gère la persistance des RealisationProjets dans la base de données.
 */
class projectRealisationRepository extends BaseRepository
{
    /**
     * Les champs de recherche disponibles pour les RealisationProjets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'titre',
        'description',
        'date_debut_realisation',
        'date_fin_realisation',
        'projet_id',
        'etat_realisation_projet_id',
        'personne_id'
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    /**
     * Constructeur de la classe RealisationProjetRepository.
     */
    public function __construct()
    {
        parent::__construct(new RealisationProjet());
    }

    /**
     * Crée un nouveau RealisationProjet.
     *
     * @param array $data Données du RealisationProjet à créer.
     * @return mixed
     * @throws RealisationProjetAlreadyExistException Si le RealisationProjet existe déjà.
     */
    public function create(array $data)
    {
        $projetId = $data['projet_id'];
        $existingRealisation = $this->model->where('projet_id', $projetId)->exists();

        // if ($existingRealisation) {
        //     throw new RealisationProjetAlreadyExistException("A RealisationProjet with this project ID already exists.");
        // } else {
            return parent::create($data);
        // }
    }

    /**
     * Recherche les RealisationProjets correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            foreach ($this->fieldsSearchable as $field) {
                $query->orWhere($field, 'like', '%' . $searchableData . '%');
            }
        })->paginate($perPage);
    }
        public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function filterProjet($page = 1, $etat = null, $learner = null, $skill = null, $project = null, $perPage = 4)
    {
        $query = $this->model->newQuery();
    
        if ($etat !== null) {
            $query->whereHas('etatRealisationProjet', function ($subQuery) use ($etat) {
                $subQuery->where('id', $etat);
            });
        }
    
        if ($learner !== null) {
            $query->whereHas('personne', function ($subQuery) use ($learner) {
                $subQuery->where('id', $learner);
            });
        }
    
        if ($project !== null) {
            $query->where('projet_id', $project);
        }
    
        if ($skill !== null) {
            // Assuming 'competence_id' is the foreign key column in 'realisation_projets'
            $query->where('competence_id', $skill);
        }
    
        return $query->paginate($perPage, ['*'], 'page', $page);
    }
    
    
    
}
