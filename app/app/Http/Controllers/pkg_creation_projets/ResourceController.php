<?php

namespace App\Http\Controllers\pkg_creation_projets;

use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_creation_projets\ResourceRequest;
use App\Repositories\pkg_creation_projets\ResourceRepository;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    protected $resourceRepository;

    public function __construct(ResourceRepository $resourceRepository)
    {
        $this->resourceRepository = $resourceRepository;
    }

    public function index(Request $request)
    {
        $resourceData = $this->resourceRepository->paginate();
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $resourceData = $this->resourceRepository->searchData($searchQuery);
                return view('resource.index', compact('resourceData'))->render();
            }
        }
        return view('resource.index', compact('resourceData'));
    }

    public function create()
    {
        $dataToEdit = null;
        return view('resource.create', compact('dataToEdit'));
    }

    public function store(ResourceRequest $request)
    {
        $validatedData = $request->validated();
        $resource = $this->resourceRepository->create($validatedData);
        return redirect()->route('resources.index')->with('success', 'La ressource a été ajoutée avec succès.');
    }

    public function show(Request $request, $id)
    {
        $resource = $this->resourceRepository->find($id);
        return view('resource.show', compact('resource'));
    }

    public function edit($id)
    {
        $dataToEdit = $this->resourceRepository->find($id);
        return view('resource.edit', compact('dataToEdit'));
    }

    public function update(ResourceRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->resourceRepository->update($id, $validatedData);
        return redirect()->route('resources.index')->with('success', 'La ressource a été modifiée avec succès.');
    }

    public function destroy($id)
    {
        $this->resourceRepository->destroy($id);
        return redirect()->route('resources.index')->with('success', 'La ressource a été supprimée avec succès.');
    }
}
