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
     * Constructeur de la classe ValidationsRepository.
     */
    public function __construct()
    {
        parent::__construct(new Validation());
    }

    /**
     * Crée une nouvelle validation avec un message associé.
     *
     * @param array $data Données du formulaire de validation.
     * @return Validation
     * @throws ValidationAlreadyExistException Si la validation existe déjà.
     */
    public function createWithMessage(array $data)
    {
        // Prepare data for creating the validation
        $validationData = [
            'note' => $data['note'],
            'transfert_competence_id' => $data['transfert_competence_id'],
            'appreciation_id' => $data['appreciation_id'],
            'realisation_projet_id' => $data['realisation_projet_id'],
        ];

        // Check if validation already exists
        if ($this->alreadyExists($validationData)) {
            throw  ValidationAlreadyExistException::createValidation();
        }

        // Create the validation
        $validation = Validation::create($validationData);

        // Create associated message
        $messageData = [
            'titre' => $data['message_title'],
            'description' => $data['message_description'],
            'validation_id' => $validation->id,
        ];
        $message = Message::create($messageData);

        return $validation;
    }

    /**
     * Checks if a similar validation already exists.
     *
     * @param array $data
     * @return bool
     */
    /**
     * Checks if a validation with the same transfert_competence_id, appreciation_id, and realisation_projet_id already exists in the database.
     *
     * @param array $data Data containing keys for transfert_competence_id, appreciation_id, and realisation_projet_id.
     * @return bool Returns true if a similar validation exists, otherwise false.
     */
    private function alreadyExists(array $data): bool
    {
        return Validation::where('transfert_competence_id', $data['transfert_competence_id'])
                         ->where('appreciation_id', $data['appreciation_id'])
                         ->where('realisation_projet_id', $data['realisation_projet_id'])
                         ->exists();
    }

   
}
