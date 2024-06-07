<?php

namespace App\Http\Controllers\pkg_creation_projets;

use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_creation_projets\NatureLivrableRequest;
use App\Repositories\pkg_creation_projets\NatureLivrableRepository;
use Illuminate\Http\Request;

class NatureLivrableController extends Controller
{
    protected $natureLivrableRepository;

    public function __construct(NatureLivrableRepository $natureLivrableRepository)
    {
        $this->natureLivrableRepository = $natureLivrableRepository;
    }

    public function index(Request $request)
    {
        $natureLivrableData = $this->natureLivrableRepository->paginate();
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $natureLivrableData = $this->natureLivrableRepository->searchData($searchQuery);
                return view('naturelivrable.index', compact('natureLivrableData'))->render();
            }
        }
        return view('naturelivrable.index', compact('natureLivrableData'));
    }

    public function create()
    {
        $dataToEdit = null;
        return view('naturelivrable.create', compact('dataToEdit'));
    }

    public function store(NatureLivrableRequest $request)
    {
        $validatedData = $request->validated();
        $natureLivrable = $this->natureLivrableRepository->create($validatedData);
        return redirect()->route('naturelivrables.index')->with('success', 'La nature du livrable a été ajoutée avec succès.');
    }

    public function show(Request $request, $id)
    {
        $natureLivrable = $this->natureLivrableRepository->find($id);
        return view('naturelivrable.show', compact('natureLivrable'));
    }

    public function edit($id)
    {
        $dataToEdit = $this->natureLivrableRepository->find($id);
        return view('naturelivrable.edit', compact('dataToEdit'));
    }

    public function update(NatureLivrableRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->natureLivrableRepository->update($id, $validatedData);
        return redirect()->route('naturelivrables.index')->with('success', 'La nature du livrable a été modifiée avec succès.');
    }

    public function destroy($id)
    {
        $this->natureLivrableRepository->destroy($id);
        return redirect()->route('naturelivrables.index')->with('success', 'La nature du livrable a été supprimée avec succès.');
    }
}
