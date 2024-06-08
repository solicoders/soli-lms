<?php

namespace App\Http\Controllers\pkg_validations;

use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_validations\ValidationRequest;
use App\Repositories\pkg_creation_projets\TransfertCompetenceRepository;
use App\Repositories\pkg_realisation_projets\EtatRealisationProjetRepository;
use App\Repositories\pkg_realisation_projets\projectRealisationRepository;
use Illuminate\Http\Request;
use App\Repositories\pkg_validations\ValidationsRepository;
use App\Models\pkg_validations\Validation;
use App\Models\pkg_realisation_projets\RealisationProjet;
use App\Models\pkg_realisation_projets\LivrableRealisation;
use App\Models\pkg_creation_projets\TransfertCompetence;
use App\Models\pkg_creation_projets\Projet;
use App\Models\pkg_competences\Competence;
use App\Models\pkg_competences\Appreciation;
use App\Models\pkg_validations\Message;
use App\Repositories\pkg_creation_projets\ProjetRepository;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Request;




class ValidationController extends Controller
{
    protected $validationsRepository;
    protected $projectRealisationRepository;

    public function __construct(
        ValidationsRepository $validationsRepository,
        projectRealisationRepository $projectRealisationRepository,
        )
    {
        $this->validationsRepository = $validationsRepository;
        $this->projectRealisationRepository = $projectRealisationRepository;
    }

    public function index()
    {
        $RealisationProjet = RealisationProjet::all();

        $validations = Validation::all(); // You might want to use repository method if pagination or specific filtering is needed
        return view('pkg_validations.index', compact('validations','RealisationProjet'));
    }

    public function show($realisationProjetId)
    {
        // Find the RealisationProjet by its ID
        $realisation = RealisationProjet::findOrFail($realisationProjetId);
    
        // Get all competencies for the project
        $competences = $realisation->projet->transfertCompetences()
        ->with(['competence', 'appreciation', 'validations' => function ($query) use ($realisationProjetId) {
            $query->where('realisation_projet_id', $realisationProjetId);
        }])->get();    
        // Get all possible appreciations
        $appreciations = Appreciation::all();
        // Get the latest message associated with the realization project
        $message = Message::whereHas('validation.realisationProjet', function ($query) use ($realisationProjetId) {
            $query->where('id', $realisationProjetId);
        })->orderBy('created_at', 'desc')->first();

      // Get notes using Eloquent relationships
     // Get notes using Eloquent relationships
     $notes = $realisation->validation()->pluck('note');
     // Convert the first note to a string with 2 decimal places
     $note = number_format($notes->first() ?? 0, 2); 
        // dd($notes);
        return view('pkg_validations.index', compact(
            'realisation',
            'competences',
            'message',
            'appreciations',
            'note' // Pass the notes to the view
        ));
    }

    public function store(ValidationRequest $request)
    {
        $realisationProjetId = $request->input('realisation_projet_id');
        $validationsData = $request->input('validations');

        // 1. Update Validation Notes and Create Messages
        foreach ($validationsData as $competenceId => $validationData) {
            // Create or update Validation
            $validation = Validation::updateOrCreate(
                [
                    'transfert_competence_id' => $competenceId,
                    'realisation_projet_id' => $realisationProjetId,
                ],
                [
                    'appreciation_id' => $validationData['appreciation_id'],
                    'note' => $validationData['note'],
                ]
            );

            // Create Appreciation if it doesn't exist yet
            if (!$validation->appreciation) {
                $appreciation = Appreciation::create([
                    'nom' => $validationData['appreciation_nom'], // Assuming you have this data
                ]);
                $validation->appreciation()->associate($appreciation)->save();
            }

            // Create Message associated with the Validation
            $message = new Message();
            $message->validation_id = $validation->id;
            $message->titre = $validationData['titre']; // Assuming you have this data
            $message->description = $validationData['description']; // Assuming you have this data
            $message->save(); 
        }

        return redirect()->route('realisationProjets.index', ['realisationProjetId' => $realisationProjetId])
            ->with('success', 'Validations and messages updated successfully!');
    }

    public function create()
    {
        return view('pkg_validations.create');
    }
}
