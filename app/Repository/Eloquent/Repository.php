<?php

namespace App\Repository\Eloquent;

use App\Repository\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{

    private $model;
    private $path;

    public function __construct() {
        $modelName = new \ReflectionClass($this);
        $modelNameToPath = str_replace('Repository', '', $modelName->getShortName());
        $this->path = 'App\Models'.'\\'.collect($modelNameToPath)->first();
        $this->model = new $this->path();
    }

    public function create($data)
    {
        return $this->model->fill($data)->save();
    }

    public function update($primaryKey, $data)
    {
        return $this->model->where("id", "=",$primaryKey)->update($data);
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
