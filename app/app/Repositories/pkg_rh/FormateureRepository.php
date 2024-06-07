<?php
namespace App\Repositories\pkg_rh;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\pkg_rh\FormateureException;
use App\Models\pkg_rh\Formateur;

class FormateureRepository extends BaseRepository
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
        parent::__construct(new Formateur());
    }

    public function create(array $data)
    {
        $nom = $data['nom'];

        $existingFormateure =  $this->model->where('nom', $nom)->exists();

        if ($existingFormateure) {
            throw FormateureException::AlreadyExistFormateure();
        } else {
            return parent::create($data);
        }
    }

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