<?php

namespace App\Http\Controllers\pkg_validations;

use App\Http\Controllers\Controller;
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
    
        $allcompetences = Competence::all();
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

        $notes = DB::table('validations')
        ->join('transfert_competences', 'validations.transfert_competence_id', '=', 'transfert_competences.id')
        ->where('validations.realisation_projet_id', $realisationProjetId)
        ->pluck('validations.note');
        $note = $notes->first() ?? 0; // Get the first note, or 0 if no notes are found
        // dd($notes);
        return view('pkg_validations.index', compact(
            'realisation',
            'competences',
            'message',
            'appreciations',
            'allcompetences',
            'note' // Pass the notes to the view
        ));
    }

    public function store(Request $request, $realisation_projet_id){

        $realisation = RealisationProjet::find($realisation_projet_id);
        $TransfertCompetence = TransfertCompetence::find($realisation_projet_id);
        $Competences = Competence::find($TransfertCompetence);
        $LivrableRealisation = LivrableRealisation::find($realisation_projet_id);
        $appreciations = Appreciation::all();
        $validations = Validation::find($realisation_projet_id);
         $Projet = Projet::all();
         $messages = Message::find($realisation_projet_id);
         $RealisationProjet = RealisationProjet::all();

        dd($request);

    }


    public function create()
    {
        return view('pkg_validations.create');
    }
}
