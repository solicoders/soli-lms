<?php

namespace App\Http\Controllers\pkg_realisation_projets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\pkg_realisation_projets\projectRealisationRepository;
use App\Models\pkg_realisation_projets\RealisationProjet;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\pkg_realisation_projets\RealisationProjetRequest; // Assuming you have specific request validation

class ProjectRealisationController extends Controller
{
    protected $projectRealisationRepository;

    public function __construct(projectRealisationRepository $projectRealisationRepository)
    {
        $this->projectRealisationRepository = $projectRealisationRepository;
    }

    public function index(Request $request)
    {
        $realisationProjets = $this->projectRealisationRepository->paginate();
        return view('pkg_realisation_projets.index', compact('realisationProjets'));
    }

    public function create()
    {
        return view('pkg_realisation_projets.realisationProjet.create');
    }

    public function store(RealisationProjetRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $this->projectRealisationRepository->create($validatedData);
            return redirect()->route('realisationProjets.index')->with('success', 'Realisation Projet created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $realisationProjet = $this->projectRealisationRepository->find($id);
        return view('pkg_realisation_projets.realisationProjet.show', compact('realisationProjet'));
    }

    public function edit($id)
    {
        $realisationProjet = $this->projectRealisationRepository->find($id);
        return view('pkg_realisation_projets.realisationProjet.edit', compact('realisationProjet'));
    }

    public function update(RealisationProjetRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->projectRealisationRepository->update($id, $validatedData);
        return redirect()->route('realisationProjets.index')->with('success', 'Realisation Projet updated successfully.');
    }

    public function destroy($id)
    {
        $this->projectRealisationRepository->destroy($id);
        return redirect()->route('realisationProjets.index')->with('success', 'Realisation Projet deleted successfully.');
    }
}


