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
use App\Http\Requests\pkg_creation_projets\ProjetRequest;
use App\Http\Requests\pkg_creation_projets\ProjetStoreRequest;
use App\Models\pkg_competences\Appreciation;
use App\Models\pkg_competences\Technologie;
use App\Models\pkg_creation_projets\NatureLivrable;
use App\Models\pkg_rh\Apprenant;
use App\Repositories\pkg_competences\CompetenceRepository;
use App\Repositories\Pkg_competences\TechnologieRepository;
use App\Repositories\pkg_creation_projets\LivrableRepository;
use App\Repositories\pkg_creation_projets\ProjetRepository;
use App\Repositories\pkg_creation_projets\ResourceRepository;
use App\Repositories\pkg_creation_projets\TechnologieCompetenceRepository;
use App\Repositories\pkg_creation_projets\TransfertCompetenceRepository;
use App\Repositories\pkg_rh\ApprenantRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class Apprenants extends Controller
{
    protected $projectRealisationRepository;
    protected $projetRepository;
    protected $livrableRepository;
    protected $resourceRepository;
    protected $competenceRepository;
    protected $technologieRepository;
    protected $apprenantRepository;
    protected $transfercompetenceRepository;
    protected $technologiecompetenceRepository;
    public function __construct(
    ProjetRepository $projetRepository,
    LivrableRepository $livrableRepository,
    ResourceRepository $resourceRepository,
    CompetenceRepository $competenceRepository,
    TechnologieRepository $technologieRepository,
    ApprenantRepository $apprenantRepository,
    TransfertCompetenceRepository $transfercompetenceRepository,
    TechnologieCompetenceRepository $technologiecompetenceRepository,

    ProjectRealisationRepository $projectRealisationRepository,)
    {
        $this->projectRealisationRepository = $projectRealisationRepository;
        $this->projetRepository = $projetRepository;
        $this->livrableRepository = $livrableRepository;
        $this->resourceRepository = $resourceRepository;
        $this->competenceRepository = $competenceRepository;
        $this->technologieRepository = $technologieRepository;
        $this->apprenantRepository = $apprenantRepository;
        $this->transfercompetenceRepository = $transfercompetenceRepository;
        $this->technologiecompetenceRepository = $technologiecompetenceRepository;
        }

    public function index(Request $request)
    {
        $realisationProjets = $this->projectRealisationRepository->with([
            'projet',
            'competence',
            'personne',
            'etatRealisationProjet',
            'validation'
        ])->paginate();
        $Competences = Competence::all();
        $projects = Projet::all();
        $EtatRealisationProjet = EtatRealisationProjet::all();
    
        // Get the current user's groupe_id
        $userGroupeId = Auth::user()->id;
    
        // Filter to get only 'apprenant' type Personnes with the same groupe_id as the current user
        $Personnes = Personne::where('type', 'apprenant')
            ->where('groupe_id', $userGroupeId)
            ->get();

        $realisationProjets = RealisationProjet::with('validation')->paginate();

        return view('pkg_realisation_projets.Apprenant.index', compact('realisationProjets', 'Competences', 'projects', 'Personnes', 'EtatRealisationProjet'));
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
        
        $projects = Projet::all();
        $pjctid = Projet::pluck('id');

        $projectCompetenceId = TransfertCompetence::whereIn('projet_id', $pjctid)->pluck('competence_id');
        $Competences = Competence::whereIn('id', $projectCompetenceId)->pluck('nom');
        $competence_id = TransfertCompetence::whereIn('competence_id', $pjctid)->pluck('competence_id');
        $Competence = Competence::whereIn('id', $competence_id)->pluck('nom');

        $EtatRealisationProjet = EtatRealisationProjet::all();
        $userGroupeId = Auth::user()->id;
        // dd($Competence);




        // dd($realisationProjet );
        return view('pkg_realisation_projets.Apprenant.show', compact('realisationProjet','projects','projectCompetenceId','Competences','EtatRealisationProjet','userGroupeId'));
    }

    public function edit($id)
    {
        $realisationProjet = $this->projectRealisationRepository->find($id);
        return view('pkg_realisation_projets.realisationProjet.edit', compact('realisationProjet','projects'));
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