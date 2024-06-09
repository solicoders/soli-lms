<?php

namespace App\Http\Controllers\pkg_rh;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\pkg_rh\Apprenant;
use App\Models\pkg_rh\Formateur;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Repositories\pkg_rh\GroupeRepository;
use App\Repositories\pkg_rh\GroupRepositorie;
use App\Repositories\pkg_rh\ApprenantRepositorie;
use App\Exceptions\pkg_rh\ApprenantAlreadyExistException;
use App\Exceptions\pkg_rh\FormateurAlreadyExistException;



class PersonneController extends Controller
{

    
    public function index(Request $request)
    {
        
        $type = $this->getType();

        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(" ", "%", $searchValue);
                $personnes = $this->searchData($searchQuery);

                return view('pkg_rh.Personnes.index', compact('personnes', 'type'))->render();
            }
        }
        $personnes = $this->getRepository()->paginate();
        return view('pkg_rh.Personnes.index', compact('personnes', 'type'));
    }


    public function create()
    {
        $type = $this->getType();
        $GroupRepositorie = new GroupeRepository();
        $groupes = $GroupRepositorie->all();
        return view('pkg_rh.Personnes.create',compact('type','groupes'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $type = $this->getType();
            $personne =  $this->getRepository()->create($data);
            return redirect()->route($type . '.index')->with('success', $type . ' a été ajouté avec succès');
        } catch (FormateurAlreadyExistException $e) {
            return back()->withInput()->withErrors(['personne_exists' =>__('pkg_rh/personne.formateurException')]);
        } catch (ApprenantAlreadyExistException $e) {
            return back()->withInput()->withErrors(['personne_exists' => __('pkg_rh/personne.apprenantException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }

    public function show($id)
    {
        $type = $this->getType();
        $personne = $this->getRepository()->find($id);
        return view('pkg_rh.Personnes.show', compact('personne'))->with('type', $type);
    }

    public function edit($id)
    {
        $type = $this->getType();
        $personne = $this->getRepository()->find($id);
        $GroupRepositorie = new GroupRepositorie();
        $groupes = $GroupRepositorie->paginate();
        return view('pkg_rh.Personnes.edit', compact('personne','type','groupes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $type = $this->getType();
        $personne = $this->getRepository()->update($id, $data);
        return back()->with('success', $type.' a été modifiée avec succès');
    }

    public function delete(Request $request ,$id)
    {
        $type = $this->getType();
        $personne = $this->getRepository()->delete($id);
        return redirect()->route($type.'.index')->with('success', $type.' a été supprimée avec succès');
    }

    private function getRepository(){
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