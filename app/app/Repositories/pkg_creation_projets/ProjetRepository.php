<?php

namespace App\Repositories\pkg_creation_projets;

use App\Models\pkg_competences\Competence;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_creation_projets\ProjetAlreadyExistException;
use App\Models\pkg_creation_projets\Projet;

class ProjetRepository extends BaseRepository
{
   /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'titre',
        'description'

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
     * Constructeur de la classe ProjetRepository.
     */
    public function __construct()
    {
        parent::__construct(new Projet());
    }

    /**
     * Crée un nouveau projet.
     *
     * @param array $data Données du projet à créer.
     * @return mixed
     * @throws ProjetAlreadyExistException Si le projet existe déjà.
     */
    public function create(array $data)
    {
        $titre = $data['titre'];

        $existingProject =  $this->model->where('titre', $titre)->exists();

        if ($existingProject) {
            throw ProjetAlreadyExistException::createProject();
        } else {
            return parent::create($data);
        }
    }

    /**
     * Recherche les projets correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('titre', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}
