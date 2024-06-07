<?php

namespace App\Http\Controllers\pkg_formations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_formations\FormationRequest;
use App\Repositories\pkg_formations\FormationRepository;
use App\Models\pkg_formations\Formateur;
use App\Models\pkg_formations\Formation;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\Log;

class FormationController extends Controller
{
    protected $formationRepository;

    public function __construct(FormationRepository $formationRepository)
    {
        $this->formationRepository = $formationRepository;
        $this->middleware('can:add formation')->only(['create', 'store']);
        $this->middleware('can:edit formation')->only(['edit', 'update']);
        $this->middleware('can:delete formation')->only(['destroy']);
        $this->middleware('can:view formation')->only(['index', 'show']);
    }

    public function index(Request $request)
{
    // Check if the user is authenticated
   

    $user = auth()->user();
    Log::info('User roles:', $user->roles->pluck('name')->toArray());
    Log::info('User permissions:', $user->getAllPermissions()->pluck('name')->toArray());

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
        $errors = session('errors', new ViewErrorBag());
        return view('GestionFormation.Formation.create', compact('dataToEdit'),['errors' => $errors]);

    }

    public function store(FormationRequest $request)
    {
        // Validate the incoming request
       
        $validatedData = $request->validated();
        
        // Check if validation fails
        if ($request->fails()) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
        
        // Continue with the insertion if validation passes
        if (!isset($validatedData['formateur_id'])) {
            // Set a default value for 'formateur_id' if not present
            $validatedData['formateur_id'] = 1;
        }
        
        // Perform the insertion
        $this->formationRepository->create($validatedData);
        
        // Redirect with success message
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
    $errors = session('errors', new ViewErrorBag());
    // Vérifier si $dataToEdit est null
    if (is_null($dataToEdit)) {
        // Afficher un message d'erreur personnalisé
        $errorMessage = "La formation avec l'identifiant $id n'a pas été trouvée.";
        return view('GestionFormation.Formation.edit', ['errorMessage' => $errorMessage]);
    }
    $formateurs = Formateur::all();
    return view('GestionFormation.Formation.edit', compact('dataToEdit','formateurs'),['errors' => $errors]);
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
