<?php

namespace App\Http\Controllers\CreationBriefProjet;


use App\Exceptions\CreationBriefProjet\BriefProjetAlreadyExistException;
use App\Http\Controllers\Controller;
use App\Imports\CreationBriefProjet\BriefProjetImport;
use App\Models\CreationBriefProjet\briefprojet;
use Illuminate\Http\Request;
use App\Http\Requests\CreationBriefProjet\briefprojetRequest;
use App\Repositories\CreationBriefProjet\BriefProjetRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\CreationBriefProjet\briefprojetExport;
use App\Repositories\CreationBriefProjet\LiverableRepository;
use App\Repositories\CreationBriefProjet\ResourceRepository;
use Maatwebsite\Excel\Facades\Excel;


class BriefProjetController extends Controller
{
    protected $briefprojetRepository;
    protected $liverableRepository;
    protected $resourceRepository;
    protected $competenceRepository;

    public function __construct(
        BriefProjetRepository $briefprojetRepository,
        LiverableRepository $liverableRepository,
        ResourceRepository $resourceRepository,
        CompetenceRepository $competenceRepository
    ) {
        $this->briefprojetRepository = $briefprojetRepository;
        $this->liverableRepository = $liverableRepository;
        $this->resourceRepository = $resourceRepository;
        $this->competenceRepository = $competenceRepository;
    }


    public function index(Request $request)
    {
        $competences = $this->briefprojetRepository->filter();
        $briefprojetData = $this->briefprojetRepository->paginate();
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $briefprojetData = $this->briefprojetRepository->searchData($searchQuery);
                return view('CreationBriefProjet.briefprojet.index', compact('briefprojetData','competences'))->render();
            }
        }
        return view('CreationBriefProjet.briefprojet.index', compact('briefprojetData','competences'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('CreationBriefProjet.briefprojet.create', compact('dataToEdit'));
    }


    public function store(briefprojetRequest $request)
    {

        try {
            $validatedData = $request->validated();
            // Create BriefProject
    $briefProject = $this->briefprojetRepository->create($validatedData);

    // Create Deliverables
    foreach ($request->input('deliverable') as $deliverableName) {
        $this->liverableRepository->create([
            'name' => $deliverableName,
            'brief_project_id' => $briefProject->id
        ]);
    }

    // Create Resources
    foreach ($request->input('project_resources') as $resourceLink) {
        $this->resourceRepository->create([
            'link' => $resourceLink,
            'nature' => 'resource',
            'brief_project_id' => $briefProject->id
        ]);
    }

    foreach ($request->input('project_references') as $referenceLink) {
        $this->resourceRepository->create([
            'link' => $referenceLink,
            'nature' => 'reference',
            'briefprojet_id' => $briefProject->id
        ]);
    }
            return redirect()->route('briefprojets.index')->with('success', 'Le briefprojet a été ajouté avec succès.');

        } catch (BriefProjetAlreadyExistException $e) {
            return back()->withInput()->withErrors(['briefprojet_exists' => __('CreationBriefProjet/briefprojet/message.createProjectException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function show(Request $request, $id)
    {
        $competence = $this->competenceRepisotory->find($id);
        $competences = $this->briefprojetRepository->filter();
        $briefprojets = $competence->briefprojets()->paginate();
        if ($request->ajax()) {
            $searchBriefProjet = $request->get('searchBriefProjet');
            $searchBriefProjet = str_replace(" ", "%", $searchBriefProjet);
            $briefprojets = $this->briefprojetRepository->searchData($searchBriefProjet, $id);
            return view('GestionProjets.briefprojet.index', compact('briefprojets', 'projects', 'project'))->render();
        }        return view('CreationBriefProjet.briefprojet.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->briefprojetRepository->find($id);
        $dataToEdit->date_debut = Carbon::parse($dataToEdit->date_debut)->format('Y-m-d');
        $dataToEdit->date_de_fin = Carbon::parse($dataToEdit->date_de_fin)->format('Y-m-d');

        return view('CreationBriefProjet.briefprojet.edit', compact('dataToEdit'));
    }


    public function update(briefprojetRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->briefprojetRepository->update($id, $validatedData);
        return redirect()->route('briefprojets.index', $id)->with('success', 'Le briefprojet a été modifier avec succès.');
    }


    public function destroy(string $id)
    {
        $this->briefprojetRepository->destroy($id);
        $briefprojetData = $this->briefprojetRepository->paginate();
        return view('CreationBriefProjet.briefprojet.index', compact('briefprojetData'))->with('succes', 'Le briefprojet a été supprimer avec succés.');
    }


    public function export()
    {
        $projects = briefprojet::all();

        return Excel::download(new BriefProjetExport($projects), 'briefprojet_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new BriefProjetImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('briefprojets.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('briefprojets.index')->with('success', 'BriefProjet a ajouté avec succès');
    }
}
