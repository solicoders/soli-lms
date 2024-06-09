<?php
namespace App\Repositories\pkg_suivi;

use App\Models\pkg_rh\Personne;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\pkg_creation_projets\Projet;
use App\Models\pkg_realisation_projets\RealisationProjet;

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
    public function getAllProjects()
    {
        // Retrieve all projects
        return Projet::all();
    }
    public function getProjectsForPersonne($personneId)
    {
        $groupeId = Personne::where('id', $personneId)->value('groupe_id');
        $projectsInGroup = RealisationProjet::whereHas('personne', function ($query) use ($groupeId) {
            $query->where('groupe_id', $groupeId);
        })->with('projet')->get();
        $projects = $projectsInGroup->map(function ($realisationProjet) {
            return $realisationProjet->projet;
        });
        return $projects->unique('id');
    }
    
}