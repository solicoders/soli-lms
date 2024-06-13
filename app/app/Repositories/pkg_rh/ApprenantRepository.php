<?php

namespace App\Repositories\pkg_rh;

use App\Models\User;
use App\Models\pkg_rh\Apprenant;
use App\Repositories\BaseRepository;
use App\Exceptions\pkg_rh\ApprenantException;
use App\Exceptions\pkg_rh\ApprenantAlreadyExistException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ApprenantRepository extends BaseRepository
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
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }
    public function __construct()
    {
        $this->type = "Apprenant";
        parent::__construct(new Apprenant());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingApprenant =  $this->model->where('nom', $nom)->exists();

        if ($existingApprenant) {
            throw ApprenantException::AlreadyExistApprenant();
        } else {
            return parent::create($data);
        }
    }

    public function paginate($search = [], $perPage = 3, array $columns = ['*']): LengthAwarePaginator
    {
        if ($this->type !== null) {
            return $this->model->where('type', $this->type)->paginate($perPage, $columns);
        } else {
            return parent::update($id, $data);
        }
    }
}