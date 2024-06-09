<?php

namespace App\Http\Controllers\pkg_suivi;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AppBaseController;
use App\Repositories\pkg_suivi\SuiviProjetRepository;
use App\Models\pkg_realisation_projets\RealisationProjet;
use App\Exceptions\pkg_realisation_projets\RealisationProjetAlreadyExistException;

/**
 * Classe RealisationProjetRepository qui gère la persistance des RealisationProjets dans la base de données.
 */
class SuiviProjetController extends AppBaseController
{
    protected $suiviProjetRepository;

    public function __construct(SuiviProjetRepository $suiviProjetRepository)
    {
        $this->suiviProjetRepository = $suiviProjetRepository;
    }

    public function index()
    {
        // Get the ID of the authenticated person
        $personneId = auth()->id();

        // Get projects being worked on by people in the group associated with the authenticated person
        $projectsInGroup = $this->suiviProjetRepository->getProjectsForPersonne($personneId);
        dd($projectsInGroup);
        // Use the projects as needed
        return view('pkg_suivi.suiviProjets', ['projects' => $projectsInGroup]);
    }
}