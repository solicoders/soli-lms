<?php

namespace App\Http\Controllers\pkg_creation_projets;

use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_creation_projets\TransfertCompetenceRequest;
use App\Repositories\pkg_creation_projets\TransfertCompetenceRepository;
use Illuminate\Http\Request;

class TransfertCompetenceController extends Controller
{
    protected $transfertCompetenceRepository;

    public function __construct(TransfertCompetenceRepository $transfertCompetenceRepository)
    {
        $this->transfertCompetenceRepository = $transfertCompetenceRepository;
    }



    public function create()
    {
        $dataToEdit = null;
        return view('transfertcompetence.create', compact('dataToEdit'));
    }

    public function store(TransfertCompetenceRequest $request)
    {
        $validatedData = $request->validated();
        $transfertCompetence = $this->transfertCompetenceRepository->create($validatedData);
        return redirect()->route('transfertcompetences.index')->with('success', 'Le transfert de compétence a été ajouté avec succès.');
    }

    public function show(Request $request, $id)
    {
        $transfertCompetence = $this->transfertCompetenceRepository->find($id);
        return view('transfertcompetence.show', compact('transfertCompetence'));
    }

    public function edit($id)
    {
        $dataToEdit = $this->transfertCompetenceRepository->find($id);
        return view('transfertcompetence.edit', compact('dataToEdit'));
    }

    public function update(TransfertCompetenceRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->transfertCompetenceRepository->update($id, $validatedData);
        return redirect()->route('transfertcompetences.index')->with('success', 'Le transfert de compétence a été modifié avec succès.');
    }

    public function destroy($id)
    {
        $this->transfertCompetenceRepository->destroy($id);
        return redirect()->route('transfertcompetences.index')->with('success', 'Le transfert de compétence a été supprimé avec succès.');
    }
}
