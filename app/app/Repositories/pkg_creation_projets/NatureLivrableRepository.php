<?php

namespace App\Repositories\pkg_creation_projets;

use App\Exceptions\pkg_creation_projets\NatureLivrableAlreadyExistException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_creation_projets\NatureLivrable;

class NatureLivrableRepository extends BaseRepository
{
 /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom', 'description'
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
        parent::__construct(new NatureLivrable());
    }
    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingProject =  $this->model->where('nom', $nom)->exists();

        if ($existingProject) {
            throw NatureLivrableAlreadyExistException::createNatureLivrable();
        } else {
            return parent::create($data);
        }
    }

}


