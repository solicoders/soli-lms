<?php
namespace App\Repositories\GestionRH;

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

}