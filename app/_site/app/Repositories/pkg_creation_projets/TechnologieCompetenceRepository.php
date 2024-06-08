<?php

namespace App\Repositories\pkg_creation_projets;

use App\Models\pkg_competences\Competence;
use App\Models\pkg_creation_projets\TechnologieCompetence;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_creation_projets\ProjetAlreadyExistException;

class TechnologieCompetenceRepository extends BaseRepository
{
/**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [

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
        parent::__construct(new TechnologieCompetence());
    }
}
