<?php

namespace App\Http\Controllers\pkg_validations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\pkg_validations\ValidationsRepository;
use App\Models\pkg_validations\Validation;
use App\Models\pkg_realisation_projets\RealisationProjet;
use App\Models\pkg_realisation_projets\LivrableRealisation;
use App\Models\pkg_competences\Competence;


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
        // dd($realisation);
        $Competences = Competence::all() ; // Assuming a relationship exists
        // dd($Competences);

        
        $LivrableRealisation = LivrableRealisation::find($realisation_projet_id);
        // dd($LivrableRealisation->lien);
    
        return view('pkg_validations.index', compact('realisation' ,'Competences'  ,'LivrableRealisation' )

        );
    }

    public function create()
    {
        return view('pkg_validations.create');
    }
}