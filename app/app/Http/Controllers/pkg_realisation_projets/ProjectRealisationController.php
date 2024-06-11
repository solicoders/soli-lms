<?php

namespace App\Http\Controllers\pkg_realisation_projets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\pkg_realisation_projets\projectRealisationRepository;
use App\Models\pkg_realisation_projets\RealisationProjet;
use App\Models\pkg_competences\Competence; // Assuming you have a Skill model
use App\Models\pkg_creation_projets\Projet; // Assuming you have a Project model
use App\Models\pkg_rh\Personne; // Assuming you have a Learner model
use App\Models\pkg_realisation_projets\EtatRealisationProjet;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\pkg_realisation_projets\RealisationProjetRequest;
use App\Models\pkg_validations\Validation;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Auth;

class ProjectRealisationController extends Controller
{
    protected $projectRealisationRepository;

    public function __construct(projectRealisationRepository $projectRealisationRepository)
    {
        $this->projectRealisationRepository = $projectRealisationRepository;
    }

    public function index(Request $request)
    {
        $realisationProjets = $this->projectRealisationRepository->paginate();
        $Competences = Competence::all();
        $projects = Projet::all();
        $EtatRealisationProjet = EtatRealisationProjet::all();
    // Get the current user's groupe_id
    $userGroupeId = Auth::user()->id;
    $user_id = Personne::where('user_id',$userGroupeId);


    // Filter to get only 'apprenant' type Personnes with the same groupe_id as the current user
    $Personnes = Personne::where('type', 'apprenant')
    ->where('user_id', $userGroupeId)
    ->get();          
    //  dd($user_id);
              $realisationProjets = RealisationProjet::with('validation')->paginate();
    // dd($validation);
         return view('pkg_realisation_projets.index', compact('realisationProjets', 'Competences', 'projects', 'Personnes','EtatRealisationProjet'));
    }

    public function create()
    {
        return view('pkg_realisation_projets.realisationProjet.create');
    }

    public function store( $request)
    {
        $validatedData = $request->validated();
        try {
            $this->projectRealisationRepository->create($validatedData);
            return redirect()->route('realisationProjets.index')->with('success', 'Realisation Projet created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $realisationProjet = $this->projectRealisationRepository->find($id);
        return view('pkg_realisation_projets.realisationProjet.show', compact('realisationProjet'));
    }

    public function edit($id)
    {
        $realisationProjet = $this->projectRealisationRepository->find($id);
        return view('pkg_realisation_projets.realisationProjet.edit', compact('realisationProjet'));
    }

    public function update( $request, $id)
    {
        $validatedData = $request->validated();
        $this->projectRealisationRepository->update($id, $validatedData);
        return redirect()->route('realisationProjets.index')->with('success', 'Realisation Projet updated successfully.');
    }

    public function destroy($id)
    {
        $this->projectRealisationRepository->destroy($id);
        return redirect()->route('realisationProjets.index')->with('success', 'Realisation Projet deleted successfully.');
    }
}