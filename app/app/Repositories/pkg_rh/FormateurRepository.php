<?php
<<<<<<< HEAD

namespace App\Repositories\pkg_rh;

use App\Models\pkg_rh\Formateur;
use App\Repositories\BaseRepository;
use App\Exceptions\pkg_rh\FormateurException;
use App\Exceptions\pkg_rh\FormateurAlreadyExistException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class FormateurRepository extends BaseRepository
{
    protected $type;

    /**
     * Les champs de recherche disponibles pour les projets.
     *
     * @var array
     */
    protected $fieldsSearchable = [
        'nom','prenom','type' ,'groupe_id'
    ];

    /**
     * Renvoie les champs de recherche disponibles.
     *
     * @return array
     */
=======
namespace App\Repositories\pkg_rh;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_rh\FormateureException;
use App\Models\pkg_rh\Formateur; 

class FormateurRepository extends BaseRepository
{
    protected $fieldsSearchable = [
        'name'
    ];

>>>>>>> 2f111a44 (up)
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }
<<<<<<< HEAD

    /**
     * Constructeur de la classe ProjetRepository.
     */
    public function __construct()
    {
        $this->type = "formateur";
=======
    public function __construct()
    {
>>>>>>> 2f111a44 (up)
        parent::__construct(new Formateur());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];
<<<<<<< HEAD
        $preom = $data['prenom'];

        $existingFormateur = $this->model->where('nom', $nom)->where('prenom', $preom)->exists();
        if ($existingFormateur) {
            throw FormateurException::AlreadyExistFormateur();
        }else{
=======

        $existingFormateure =  $this->model->where('nom', $nom)->exists();

        if ($existingFormateure) {
            throw FormateureException::AlreadyExistFormateure();
        } else {
>>>>>>> 2f111a44 (up)
            return parent::create($data);
        }
    }

<<<<<<< HEAD

    public function paginate($search = [], $perPage = 3, array $columns = ['*']): LengthAwarePaginator
    {
        if ($this->type !== null) {
            return $this->model->where('type', $this->type)->paginate($perPage, $columns);
        } else {
            return $this->model->paginate($perPage, $columns);
        }
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
        return $this->model->where('type', 'Formateur')->where(function($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('prenom', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}
=======
    public function update($id, array $data)
    {
        $nom = $data['nom'];

        $existingFormateure =  $this->model->where('nom', $nom)->where('id', '!=', $id)->exists();

        if ($existingFormateure) {
            throw FormateureException::AlreadyExistFormateure();
        } else {
            return parent::update($id, $data);
        }
    }
}
>>>>>>> 2f111a44 (up)
