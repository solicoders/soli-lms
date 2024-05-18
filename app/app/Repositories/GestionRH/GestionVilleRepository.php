<?php
namespace App\Repositories\GestionRH;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\GestionRH\VilleException;
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
            throw VilleException::AlreadyExistVille();
        } else {
            return parent::create($data);
        }
    }

    public function update($id, array $data)
    {
        $nom = $data['nom'];

        $existingVille =  $this->model->where('nom', $nom)->where('id', '!=', $id)->exists();

        if ($existingVille) {
            throw VilleException::AlreadyExistVille();
        } else {
            return parent::update($id, $data);
        }
    }
}