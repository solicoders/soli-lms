<?php

namespace App\Repositories\pkg_validations;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_validations\ValidationAlreadyExistException;
use App\Models\pkg_validations\Message;
use App\Models\pkg_validations\Validation;

class ValidationsRepository extends BaseRepository
{
   /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'note',

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
        parent::__construct(new Validation());
    }

    /**
     * Crée un nouveau projet.
     *
     * @param array $data Données du projet à créer.
     * @return mixed
     * @throws ValidationAlreadyExistException Si le projet existe déjà.
     */
    public function create(array $data)
    {
        $titre = $data['titre'];
    
        $existingProject = $this->model->where('titre', $titre)->exists();
    
        if ($existingProject) {
            throw ValidationAlreadyExistException::createValidation();
        } else {
            // Prepare data for creating the validation
            $validationData = [
                'note' => $data['note'],
                'transfert_competence_id' => $data['transfert_competence_id'],
                'appreciation_id' => $data['appreciation_id'],
                'realisation_projet_id' => $data['realisation_projet_id'],
            ];
    
            // Create the validation
            $validation = parent::create($validationData);
    
            // Create associated message
            $messageData = [
                'titre' => $data['message_titre'],
                'description' => $data['message_description'],
                'validation_id' => $validation->id,
            ];
            $message = Message::create($messageData);
    
            return $validation;
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
