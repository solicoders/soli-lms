<?php
namespace App\Repositories\GestionVilleRepository;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\GestionRH\VilleAlreadyExistException;
use App\Models\GestionRH\Ville;

class GestionVilleRepository extends BaseRepository
{
    protected $fieldsSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }
    public function __construct()
    {
        parent::__construct(new Ville());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingVille =  $this->model->where('nom', $nom)->exists();

        if ($existingVille) {
            throw VilleAlreadyExistException::createVille();
        } else {
            return parent::create($data);
        }
    }

    /**
     * Recherche les projets correspondants aux critères spécifiés.
     *
     * @param mixed $searchableData Données de recherche.
     * @param int $perPage Nombre d'éléments par page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function searchData($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
}