<?php
namespace App\Repositories\pkg_rh;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_rh\GroupeException;
use App\Models\pkg_rh\Groupe;

class GroupeRepository extends BaseRepository
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
        parent::__construct(new Groupe());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingGroupe =  $this->model->where('nom', $nom)->exists();

        if ($existingGroupe) {
            throw GroupeException::AlreadyExistGroupe();
        } else {
            return parent::create($data);
        }
    }

    public function update($id, array $data)
    {
        $nom = $data['nom'];

        $existingGroupe =  $this->model->where('nom', $nom)->where('id', '!=', $id)->exists();

        if ($existingGroupe) {
            throw GroupeException::AlreadyExistGroupe();
        } else {
            return parent::update($id, $data);
        }
    }
}