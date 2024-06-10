<?php

namespace App\Http\Controllers\pkg_formations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_formations\FormationRequest;
use App\Repositories\pkg_formations\FormationRepository;
use App\Imports\pkg_formations\FormationsImport;
use App\Exports\pkg_formations\FormationsExport;
use Maatwebsite\Excel\Facades\Excel;


class FormationController extends Controller
{
    protected $formationRepository;

    public function __construct(FormationRepository $formationRepository)
    {
        $this->formationRepository = $formationRepository;
    }

    public function index(Request $request)
    {
        $searchValue = $request->input('search');
        $formationData = $this->formationRepository->searchData($searchValue, 10);
        return view('GestionFormation.Formation.index', compact('formationData'));
    }


    public function create()
    {  
        $dataToEdit = null;
        return view('GestionFormation.Formation.create', compact('dataToEdit'));
    }

    public function store(FormationRequest $request)
    {
        $validatedData = $request->validated();
        $formation = $this->formationRepository->create($validatedData);
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
        return view('GestionFormation.Formation.edit', compact('dataToEdit'));
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
    public function import(Request $request)
{
    $file = $request->file('file');

    // Validate the file
    // Process the file using Excel import

    // Example using Maatwebsite Excel package
    Excel::import(new FormationsImport, $file);

    return Excel::download(new YourExport(), 'filename.xlsx', \Maatwebsite\Excel\Excel::XLSX);
}
public function export()
{
    // Example using Maatwebsite Excel package
    return Excel::download(new FormationsExport, 'formations.xlsx');
}

}
