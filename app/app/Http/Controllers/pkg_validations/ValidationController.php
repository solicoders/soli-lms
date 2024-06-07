<?php

namespace App\Http\Controllers\pkg_validations;

use App\Http\Controllers\Controller;
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
// use Illuminate\Http\Request;




class ValidationController extends Controller
{
    protected $validationsRepository;

    public function __construct(ValidationsRepository $validationsRepository)
    {
        $this->validationsRepository = $validationsRepository;
    }

    public function index()
    {
        $RealisationProjet = RealisationProjet::all();

        $validations = Validation::all(); // You might want to use repository method if pagination or specific filtering is needed
        return view('pkg_validations.index', compact('validations','RealisationProjet'));
    }

    public function show($realisation_projet_id)
    {
        $realisation = RealisationProjet::find($realisation_projet_id);
        $TransfertCompetence = TransfertCompetence::find($realisation_projet_id);
        $Competences = Competence::find($TransfertCompetence); 
        $LivrableRealisation = LivrableRealisation::find($realisation_projet_id);
        $appreciations = Appreciation::all();
        $validations = Validation::find($realisation_projet_id);
         $Projet = Projet::all();
         $messages = Message::find($realisation_projet_id);
         $RealisationProjet = RealisationProjet::all();
        return view('pkg_validations.index', compact('realisation' ,'Competences'  ,'LivrableRealisation','appreciations','validations','Projet','messages')

        );
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