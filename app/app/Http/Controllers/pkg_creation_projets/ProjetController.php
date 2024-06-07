<?php

namespace App\Http\Controllers\pkg_creation_projets;

use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_creation_projets\ProjetRequest;
use App\Models\pkg_competences\Competence;
use App\Models\pkg_competences\Appreciation;
use App\Models\pkg_competences\Technologie;
use App\Models\pkg_creation_projets\NatureLivrable;
use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_rh\Personne;
use App\Repositories\pkg_competences\CompetenceRepository;
use App\Repositories\Pkg_competences\TechnologieRepository;
use App\Repositories\pkg_creation_projets\LivrableRepository;
use App\Repositories\pkg_creation_projets\ProjetRepository;
use App\Repositories\pkg_creation_projets\ResourceRepository;
use App\Repositories\pkg_creation_projets\TechnologieCompetenceRepository;
use App\Repositories\pkg_creation_projets\TransfertCompetenceRepository;
use App\Repositories\pkg_realisation_projets\projectRealisationRepository;
use App\Repositories\pkg_rh\ApprenantRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProjetController extends Controller
{
    protected $projetRepository;
    protected $livrableRepository;
    protected $resourceRepository;
    protected $competenceRepository;
    protected $technologieRepository;
    protected $apprenantRepository;
    protected $transfercompetenceRepository;
    protected $technologiecompetenceRepository;
    protected $projectRealisationRepository;

    public function __construct(
        ProjetRepository $projetRepository,
        LivrableRepository $livrableRepository,
        ResourceRepository $resourceRepository,
        CompetenceRepository $competenceRepository,
        TechnologieRepository $technologieRepository,
        ApprenantRepository $apprenantRepository,
        TransfertCompetenceRepository $transfercompetenceRepository,
        TechnologieCompetenceRepository $technologiecompetenceRepository,
        projectRealisationRepository $projectRealisationRepository,

    ) {
        $this->projetRepository = $projetRepository;
        $this->livrableRepository = $livrableRepository;
        $this->resourceRepository = $resourceRepository;
        $this->competenceRepository = $competenceRepository;
        $this->technologieRepository = $technologieRepository;
        $this->apprenantRepository = $apprenantRepository;
        $this->transfercompetenceRepository = $transfercompetenceRepository;
        $this->technologiecompetenceRepository = $technologiecompetenceRepository;
        $this->projectRealisationRepository = $projectRealisationRepository;
    }

    public function index(Request $request)
    {
        // Assuming 'transfertCompetences', 'competence', and other related models are the relationships
        $projetData = $this->projetRepository->with([
            'livrables',
            'resources',
            'transfertCompetences.competence',
            'transfertCompetences.appreciation'
        ])->paginate();


        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $projetData = $this->projetRepository->searchData($searchQuery);
                return view('pkg_creation_projets.index', compact('projetData'))->render();
            }
        }
        return view('pkg_creation_projets.index', compact('projetData'));
    }

    public function create()
    {
        $dataToEdit = null;
        $apprenants = Personne::whereIn('type', ['Formateur', 'Apprenant'])->get();
        $competences = Competence::all();
        $appreciations = Appreciation::all();
        $livrableNatures = NatureLivrable::all();
        $technologies = Technologie::all();
        return view('pkg_creation_projets.create', compact('dataToEdit', 'apprenants', 'competences', 'appreciations', 'livrableNatures','technologies'));
    }

    public function store(ProjetRequest $request)
    {
        // 1. Validate the request data
        $validatedData = $request->validated();

        // 2. Create the project using the repository
        $projet = $this->projetRepository->create($validatedData);

        // 3. Create livrables (if any)
        if (isset($validatedData['livrable'])) {
            foreach ($validatedData['livrable'] as $index => $livrable) {
                $livrableData = [
                    'titre' => $livrable,
                    'description' => $validatedData['livrable_description'][$index] ?? null,
                    'lien' => $validatedData['livrable_link'][$index] ?? null,
                    'nature_livrable_id' => $validatedData['livrable_nature'][$index],
                    'projet_id' => $projet->id,
                ];
                $this->livrableRepository->create($livrableData);
            }
        }

        // 4. Create resources (if any)
        if (isset($validatedData['ressource_nom'])) {
            foreach ($validatedData['ressource_nom'] as $index => $ressource_nom) {
                $ressourceData = [
                    'nom' => $ressource_nom,
                    'description' => $validatedData['ressource_description'][$index] ?? null,
                    'lien' => $validatedData['ressource_lien'][$index] ?? null,
                    'projet_id' => $projet->id,
                ];
                $this->resourceRepository->create($ressourceData);
            }
        }


    // 5. Create TransfertCompetence records
    if (isset($validatedData['competences'])) {
        foreach ($validatedData['competences'] as $competence_id) {
            $transfertCompetenceData = [
                'projet_id' => $projet->id,
                'competence_id' => $competence_id,
                'appreciation_id' => $validatedData['competence_' . $competence_id . '_appreciation'],
            ];
            $transfertCompetence = $this->transfercompetenceRepository->create($transfertCompetenceData);

            // 6. Attach technologies (if any) to the newly created TransfertCompetence
            if (isset($validatedData['technologie_ids'])) {
                foreach ($validatedData['technologie_ids'] as $technologie_id) {
                    $technologieCompetenceData = [
                        'transfert_competence_id' => $transfertCompetence->id,
                        'technologie_id' => $technologie_id,
                    ];
                    $this->technologiecompetenceRepository->create($technologieCompetenceData);
                }
            }
        }
    }

    if (isset($validatedData['apprenants'])) {
        foreach ($validatedData['apprenants'] as $apprenantId) {
            $realisationProjetData = [
                'projet_id' => $projet->id,
                'personne_id' => $apprenantId, // Assuming 'personne_id' is the apprenant ID field
                'date_debut_realisation' => now(), // Or set a default start date
                'date_fin_realisation' => now()->addDays(14), // Or set a default end date (example: 14 days)
                'etat_realisation_projet_id' => 1, // Or set a default state ID
            ];
            $this->projectRealisationRepository->create($realisationProjetData);
        }
    }

        // 8. Redirect with a success message
        return redirect()->route('projets.index')->with('success', 'Le projet a été ajouté avec succès.');
    }


    public function show(Request $request, $id)
    {
        $projet =  $this->projetRepository->with([
            'livrables.natureLivrable',
            'resources',
            'transfertCompetences.competence',
            'transfertCompetences.appreciation'
        ])->findOrFail($id);
        return view('pkg_creation_projets.show', compact('projet'));
    }

    public function edit($id)
    {
        $dataToEdit = $this->projetRepository->find($id);
        $dataToEdit->dateDebut = Carbon::parse($dataToEdit->dateDebut)->format('Y-m-d');
        $dataToEdit->dateFin = Carbon::parse($dataToEdit->dateFin)->format('Y-m-d');
        return view('pkg_creation_projets.edit', compact('dataToEdit'));
    }

    public function update(ProjetRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->projetRepository->update($id, $validatedData);
        return redirect()->route('projets.index')->with('success', 'Le projet a été modifié avec succès.');
    }

    public function destroy($id)
    {
        $this->projetRepository->destroy($id);
        return redirect()->route('projets.index')->with('success', 'Le projet a été supprimé avec succès.');
    }
}
