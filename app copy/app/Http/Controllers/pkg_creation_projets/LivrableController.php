<?php

namespace App\Http\Controllers\pkg_creation_projets;

use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_creation_projets\LivrableRequest;
use App\Repositories\pkg_creation_projets\LivrableRepository;
use Illuminate\Http\Request;

class LivrableController extends Controller
{
    protected $livrableRepository;

    public function __construct(LivrableRepository $livrableRepository)
    {
        $this->livrableRepository = $livrableRepository;
    }

    public function index(Request $request)
    {
        $livrableData = $this->livrableRepository->paginate();
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $livrableData = $this->livrableRepository->searchData($searchQuery);
                return view('livrable.index', compact('livrableData'))->render();
            }
        }
        return view('livrable.index', compact('livrableData'));
    }

    public function create()
    {
        $dataToEdit = null;
        return view('livrable.create', compact('dataToEdit'));
    }

    public function store(LivrableRequest $request)
    {
        $validatedData = $request->validated();
        $livrable = $this->livrableRepository->create($validatedData);
        return redirect()->route('livrables.index')->with('success', 'Le livrable a été ajouté avec succès.');
    }

    public function show(Request $request, $id)
    {
        $livrable = $this->livrableRepository->find($id);
        return view('livrable.show', compact('livrable'));
    }

    public function edit($id)
    {
        $dataToEdit = $this->livrableRepository->find($id);
        return view('livrable.edit', compact('dataToEdit'));
    }

    public function update(LivrableRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->livrableRepository->update($id, $validatedData);
        return redirect()->route('livrables.index')->with('success', 'Le livrable a été modifié avec succès.');
    }

    public function destroy($id)
    {
        $this->livrableRepository->destroy($id);
        return redirect()->route('livrables.index')->with('success', 'Le livrable a été supprimé avec succès.');
    }
}
