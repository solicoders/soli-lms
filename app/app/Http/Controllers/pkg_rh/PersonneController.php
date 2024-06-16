<?php

namespace App\Http\Controllers\pkg_rh;

use App\Exceptions\pkg_rh\ApprenantException;
use App\Exceptions\pkg_rh\FormateurException;
use App\Exports\pkg_rh\ApprenantExport;
use App\Exports\pkg_rh\FormateurExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_rh\FormateurRequest;
use App\Http\Requests\pkg_rh\PersonneRequest;
use App\Imports\pkg_rh\ApprenantImport;
use App\Imports\pkg_rh\FormateurImport;
use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_rh\Formateur;
use App\Models\User;
use App\Repositories\pkg_rh\GroupeRepository;
use App\Repositories\pkg_rh\NiveauScolaireRepository;
use App\Repositories\pkg_rh\SpecialiteRepository;
use App\Repositories\pkg_rh\VilleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\pkg_rh\ApprenantRepositorie;
use App\Repositories\pkg_rh\GroupRepositorie;



class PersonneController extends Controller
{


    public function index(Request $request)
    {

        $view = 'pkg_rh.'. $this->getType() .'.index';
        $type = $this->getType();

        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(" ", "%", $searchValue);
                $personnes = $this->searchData($searchQuery);

                return view($view, compact('personnes', 'type'))->render();
            }
        }
        $personnes = $this->getRepositorie()->paginate();
        return view($view, compact('personnes', 'type'));
    }


    public function create()
    {
        $type = $this->getType();
        $GroupRepositorie = new GroupeRepository();

        $groupes = $GroupRepositorie->paginate();
        return view('pkg_rh.personne.create',compact('type','groupes'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $type = $this->getType();
            $personne =  $this->getRepositorie()->create($data);
            return redirect()->route($type . '.index')->with('success', $type . ' a été ajouté avec succès');
        } catch (FormateurException $e) {
            return back()->withInput()->withErrors(['personne_exists' =>__('pkg_rh/personne.formateurException')]);
        } catch (ApprenantException $e) {
            return back()->withInput()->withErrors(['personne_exists' => __('pkg_rh/personne.apprenantException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function show($id)
    {
        $type = $this->getType();
        $personne = $this->getRepositorie()->find($id);
        return view('pkg_rh.personne.show', compact('personne'))->with('type', $type);
    }

    public function edit($id)
    {
        $type = $this->getType();
        $personne = $this->getRepositorie()->find($id);
        $GroupRepositorie = new GroupeRepository();
        $groupes = $GroupRepositorie->paginate();
        return view('pkg_rh.personne.edit', compact('personne','type','groupes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $type = $this->getType();
        $personne = $this->getRepositorie()->update($id, $data);
        return back()->with('success', $type.' a été modifiée avec succès');
    }

    public function delete(Request $request ,$id)
    {
        $type = $this->getType();
        $personne = $this->getRepositorie()->delete($id);
        return redirect()->route($type.'.index')->with('success', $type.' a été supprimée avec succès');
    }

    private function getRepositorie(){
        $route = Route::getCurrentRoute()->getName();
        $type = explode('.',$route);
        $model = str::ucfirst($type[0]);
        $modelRepository = $model.'Repository';
        $path = "\\App\\Repositories\\pkg_rh\\".$modelRepository;

        if($model === 'Formateur'){
            $repository = new $path();
        }elseif($model === 'Apprenant'){
            $repository = new $path();
        }
        return $repository;
    }

    private function getType(){
        $route = Route::getCurrentRoute()->getName();
        $type = explode('.',$route);
        return $type[0];
    }

}
