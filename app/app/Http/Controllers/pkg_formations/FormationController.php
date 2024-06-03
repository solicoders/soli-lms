<?php

namespace App\Http\Controllers\pkg_formations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_formations\FormationRequest;
use App\Repositories\pkg_formations\FormationRepository;



class FormationController extends Controller
{
    protected $formationRepository;

    public function __construct(FormationRepository $formationRepository)
    {
        $this->formationRepository = $formationRepository;
    }

    public function index(Request $request)
    {
        $formationData = $this->formationRepository->paginate();
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $formationData = $this->formationRepository->searchData($searchQuery);
                return view('formation.index', compact('formationData'))->render();
            }
        }
        return view('GestionFormation.Formation.index', compact('formationData'));
    }

    public function create()
    {
        $dataToEdit = null;
        return view('formation.create', compact('dataToEdit'));
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
        return view('formation.show', compact('formation'));
    }

    public function edit($id)
    {
        $dataToEdit = $this->formationRepository->find($id);
        return view('formation.edit', compact('dataToEdit'));
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
}
