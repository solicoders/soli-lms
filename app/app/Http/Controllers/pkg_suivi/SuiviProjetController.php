<?php

namespace App\Http\Controllers\pkg_suivi;

use App\Http\Controllers\AppBaseController;
use App\Repositories\pkg_suivi\SuiviProjetRepository;
use Illuminate\Support\Facades\Auth;

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
        // $projects = $this->suiviProjetRepository->paginate();
    
        return view('pkg_suivi.suiviProjets', compact('projects'));
    }
    
}
