<?php
namespace App\Http\Controllers\pkg_suivi;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use App\Repositories\pkg_suivi\SuiviProjetRepository;

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
        $personneId = Auth::id();

        // Fetch projects for the authenticated person's group
        $projects = $this->suiviProjetRepository->getProjectsForPersonne($personneId);

        return view('pkg_suivi.suiviProjets', compact('projects'));
    }
}
