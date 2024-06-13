<?php
namespace App\Repositories\pkg_rh;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_rh\ApprenantException;
use App\Models\pkg_rh\Apprenant;

class ApprenantRepository extends BaseRepository
{
    protected $fieldsSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }



    /**
     * Constructeur de la classe ProjetRepository.
     */
    public function __construct()
    {
        parent::__construct(new Apprenant());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        
        $existingApprenant = $this->model->where('nom', $nom)->where('prenom', $prenom)->exists();
        if ($existingApprenant) {
            throw ApprenantException::AlreadyExistApprenant();
        }else{
            return parent::create($data);
        }

    }

    public function update($id, array $data)
    {
        $nom = $data['nom'];

        $existingApprenant =  $this->model->where('nom', $nom)->where('id', '!=', $id)->exists();

        if ($existingApprenant) {
            throw ApprenantException::AlreadyExistApprenant();
        } else {
            return $this->model->paginate($perPage, $columns);
        }
    }

    public function getAll(){
        return $this->model->with('user')->get();
    }
    


    /**
     * Recherche apprenants correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 10)
    {
        return $this->model->where('type', 'Apprenant')->where(function($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('prenom', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}