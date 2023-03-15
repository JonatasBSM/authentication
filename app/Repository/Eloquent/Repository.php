<?php

namespace App\Repository\Eloquent;

use App\Repository\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{

    public function __construct(protected Model $model) {

    }

    public function create($data)
    {
        return $this->model->fill($data)->save();
    }

    public function update($primaryKey, $data)
    {
        return $this->find($primaryKey)->update($data);
    }

    public function destroy($primaryKey)
    {
        return $this->find($primaryKey)->destroy();
    }

    public function find($primaryKey)
    {
        return $this->model->find($primaryKey);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function thenCreate($primaryKey,array $dataForUpdate, array $dataForSave) {

        if($this->find($primaryKey))
            return $this->update($primaryKey, $dataForUpdate);

        return $this->create($dataForSave);
    }

}
