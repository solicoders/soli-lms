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
    public function __construct()
    {
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

    public function update($id, array $data)
    {
        $nom = $data['nom'];

        $existingApprenant =  $this->model->where('nom', $nom)->where('id', '!=', $id)->exists();

        if ($existingApprenant) {
            throw ApprenantException::AlreadyExistApprenant();
        } else {
            return parent::update($id, $data);
        }
    }
}