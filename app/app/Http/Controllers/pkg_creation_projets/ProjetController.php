<?php

namespace App\Http\Controllers\pkg_creation_projets;

use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_creation_projets\ProjetRequest;
use App\Http\Requests\pkg_creation_projets\ProjetStoreRequest;
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
use App\Repositories\pkg_realisation_projets\ProjectRealisationRepository;
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

        ProjectRealisationRepository $projectRealisationRepository,

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
        $apprenants = Personne::whereIn('type', ['Apprenant'])->get();
        $competences = Competence::all();
        $appreciations = Appreciation::all();
        $livrableNatures = NatureLivrable::all();
        $technologies = Technologie::all();
        return view('pkg_creation_projets.create', compact('dataToEdit', 'apprenants', 'competences', 'appreciations', 'livrableNatures','technologies'));
    }

    public function store(ProjetStoreRequest $request)
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
            // Get the appreciation ID directly from the request
            $appreciation_id = $request->input('competence_' . $competence_id . '_appreciation');

            $transfertCompetenceData = [
                'projet_id' => $projet->id,
                'competence_id' => $competence_id,
                'appreciation_id' => $appreciation_id,
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
    
        // Fetch associated data for the edit form
        $dataToEdit->livrables = $this->livrableRepository->where('projet_id', $id)->get();
        $dataToEdit->resources = $this->resourceRepository->where('projet_id', $id)->get();
        $dataToEdit->transfertCompetences = $this->transfercompetenceRepository->where('projet_id', $id)->get();
        
        // Load apprenants relationship
        $dataToEdit->load('realisationProjets.personne');
        
        // Check if $dataToEdit->transfertCompetences exists and is not null
        if ($dataToEdit->transfertCompetences) {
            $dataToEdit->transfertCompetences->load('competence.technologies', 'appreciation');
        }
    
        // Convert date strings to DateTime objects if they are not already
        if (!$dataToEdit->dateDebut instanceof \DateTime) {
            $dataToEdit->dateDebut = new \DateTime($dataToEdit->dateDebut);
        }
        if (!$dataToEdit->dateFin instanceof \DateTime) {
            $dataToEdit->dateFin = new \DateTime($dataToEdit->dateFin);
        }
    
        $dateDebutFormatted = $dataToEdit->dateDebut->format('Y-m-d');
        $dateFinFormatted = $dataToEdit->dateFin->format('Y-m-d');
    
        $apprenants = Personne::whereIn('type', ['Apprenant'])->get();
        $competences = Competence::all();
        $appreciations = Appreciation::all();
        $livrableNatures = NatureLivrable::all();
        $technologies = Technologie::all();
    
        return view('pkg_creation_projets.create', compact('dataToEdit', 'dateDebutFormatted', 'dateFinFormatted', 'apprenants', 'competences', 'appreciations', 'livrableNatures', 'technologies'));
    }
    
    
    
    
    public function update(ProjetRequest $request, $id)
    {
        $validatedData = $request->validated();

        $projet = $this->projetRepository->find($id);

        // Update the project
        $projet->update($validatedData);

        // Handle Livrables
        if (isset($validatedData['livrable'])) {
            // Delete existing livrables
            $this->livrableRepository->where('projet_id', $id)->delete();

            // Create new livrables
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

        // Handle Resources
        if (isset($validatedData['ressource_nom'])) {
            // Delete existing resources
            $this->resourceRepository->where('projet_id', $id)->delete();

            // Create new resources
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

        // Handle TransfertCompetences
        if (isset($validatedData['competences'])) {
            // Delete existing transfertCompetences
            $this->transfercompetenceRepository->where('projet_id', $id)->delete();

            // Create new transfertCompetences
            foreach ($validatedData['competences'] as $competence_id) {
                $appreciation_id = $request->input('competence_' . $competence_id . '_appreciation');

                $transfertCompetenceData = [
                    'projet_id' => $projet->id,
                    'competence_id' => $competence_id,
                    'appreciation_id' => $appreciation_id,
                ];
                $transfertCompetence = $this->transfercompetenceRepository->create($transfertCompetenceData);

                // Attach technologies (if any)
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

        // Handle RealisationProjets
        if (isset($validatedData['apprenants'])) {
            // Delete existing realisationProjets
            $this->projectRealisationRepository->where('projet_id', $id)->delete();

            // Create new realisationProjets
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

        return redirect()->route('projets.index')->with('success', 'Le projet a été modifié avec succès.');
    }

    public function destroy($id)
    {
        $this->projetRepository->destroy($id);
        return redirect()->route('projets.index')->with('success', 'Le projet a été supprimé avec succès.');
    }
}
