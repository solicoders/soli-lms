<?php
namespace App\Repositories\pkg_suivi;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_creation_projets\Projet;

class SuiviProjetRepository extends BaseRepository
{
   /**
     * Les champs de recherche disponibles pour les tasks.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom'
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

    public function __construct()
    {
        parent::__construct(new Projet());
    }
}