<?php

namespace App\Http\Controllers\pkg_formations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_formations\FormationRequest;
use App\Repositories\pkg_formations\FormationRepository;
use App\Models\pkg_formations\Formateur;
use App\Models\pkg_formations\Formation;

class FormationController extends Controller
{
    protected $formationRepository;

    public function __construct(FormationRepository $formationRepository)
    {
        $this->formationRepository = $formationRepository;
    }

    public function index(Request $request)
    {
        $formationData = $this->formationRepository->with('formateur')->paginate();
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $formationData = $this->formationRepository->with('formateur')->searchData($searchQuery);
                return view('GestionFormation.Formation.index', compact('formationData'))->render();
            }
        }
    
        return view('GestionFormation.Formation.index', compact('formationData'));
    }
    

    

    public function create()
    {
        $dataToEdit = Formateur::all();
        return view('GestionFormation.Formation.create', compact('dataToEdit'));

    }

    public function store(FormationRequest $request)
{
    
    $validatedData = $request->validated();
    
    // Vérifier si le champ "lien" est vide
    if(empty($validatedData['lien'])) {
        // Retourner une réponse d'erreur indiquant que le champ "lien" est obligatoire
        return redirect()->back()->withErrors(['lien' => 'Le champ lien est obligatoire'])->withInput();
    }
    if (!isset($validatedData['formateur_id'])) {
        // Si le champ "formateur_id" n'est pas présent, définir une valeur par défaut
        $validatedData['formateur_id'] = 1; // Valeur par défaut du formateur_id
    }

    // Le champ "lien" n'est pas vide, donc nous pouvons continuer avec l'insertion
    $formations = $this->formationRepository->create($validatedData);
    return redirect()->route('formations.index')->with('success', 'La formation a été ajoutée avec succès.');
}


public function show(Request $request, $id)
{
    $formation = $this->formationRepository->find($id);
    return view('GestionFormation.Formation.show', compact('formation'));
}


    public function edit($id)
{
    $dataToEdit = $this->formationRepository->find($id);

    // Vérifier si $dataToEdit est null
    if (is_null($dataToEdit)) {
        // Afficher un message d'erreur personnalisé
        $errorMessage = "La formation avec l'identifiant $id n'a pas été trouvée.";
        return view('GestionFormation.Formation.edit', ['errorMessage' => $errorMessage]);
    }
    $formateurs = Formateur::all();
    return view('GestionFormation.Formation.edit', compact('dataToEdit','formateurs'));
}


    public function update(FormationRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->formationRepository->update($id, $validatedData);
        return redirect()->route('formations.index')->with('success', 'La formation a été modifiée avec succès.');
    }

    public function destroy($id)
    {
        $this->formationRepository->destroy($id);
        return redirect()->route('formations.index')->with('success', 'La formation a été supprimée avec succès.');
    }
    
    

    public function showFormationsApprenant()
{
    $formations = Formation::with('formateur')->get();
    return view('formations_apprenant', compact('formations'));
}
    
}
