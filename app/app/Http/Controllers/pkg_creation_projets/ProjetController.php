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
use App\Repositories\pkg_creation_projets\ProjetRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProjetController extends Controller
{
    protected $projetRepository;

    public function __construct(ProjetRepository $projetRepository)
    {
        $this->projetRepository = $projetRepository;
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
        $validatedData = $request->validated();
        $projet = $this->projetRepository->create($validatedData);
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
