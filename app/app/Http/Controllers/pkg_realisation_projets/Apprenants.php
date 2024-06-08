<?php

namespace App\Http\Controllers\pkg_realisation_projets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\pkg_realisation_projets\projectRealisationRepository;
use App\Models\pkg_realisation_projets\RealisationProjet;
use App\Models\pkg_competences\Competence;
use App\Models\pkg_competences\NiveauCompetence;
use App\Models\pkg_creation_projets\Projet;
use App\Models\pkg_creation_projets\TransfertCompetence;
use App\Models\pkg_rh\Personne;
use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_realisation_projets\EtatRealisationProjet;

use Illuminate\Support\Facades\Auth;

class Apprenants extends Controller
{
    protected $projectRealisationRepository;

    public function __construct(projectRealisationRepository $projectRealisationRepository)
    {
        $this->projectRealisationRepository = $projectRealisationRepository;
    }

    public function index(Request $request)
    {
        $realisationProjets = $this->projectRealisationRepository->paginate();

        $projectID = $this->projectRealisationRepository->all();
        // dd($projectID);
        $Competences = Competence::all();
        $projects = Projet::all();
        $pjctid = Projet::pluck('id');
        
        $EtatRealisationProjet = EtatRealisationProjet::all();
        $userGroupeId = Auth::user()->id;
        // $Personnes = Apprenant::where()
        //     ('user_id', $userGroupeId)
        //     ->get();
        $projectCompetenceId = TransfertCompetence::whereIn('projet_id', $pjctid)->pluck('competence_id');
        $Competence = Competence::whereIn('id', $projectCompetenceId)->pluck('id');
        $nivauCopetence = NiveauCompetence::whereIn('competence_id', $Competence)->pluck('nom');

        // dd($nivauCopetence);

        $realisationProjets = RealisationProjet::with('validation')->paginate();

        return view('pkg_realisation_projets.Apprenant.index', compact('realisationProjets', 'Competences', 'projects', 
        // 'Personnes', 
        'nivauCopetence',
        'EtatRealisationProjet'));
    }

    public function create()
    {
        return view('pkg_realisation_projets.realisationProjet.create');
    }

    public function store(Request $request)
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

    public function update(Request $request, $id)
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