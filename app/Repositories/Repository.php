<?php

namespace App\Repositories;

use App\Models\PasswordResetTokens;

class Repository
{

    private $model;
    private $path;

    public function __construct() {
        preg_match("/[^\\\]*$/", get_class($this), $modelName);
        $modelName = str_replace('Repository', '', $modelName);
        $this->path = 'App\Models'.'\\'.collect($modelName)->first();
        $this->model = new $this->path();
    }
    public function find(
        array $property,string $orderColumn,string $returnedValue, bool $desc = false, string $firstOrGet = 'first'
    ):mixed {

        if($desc)
            $dbInstance = $this->model->where($property)->orderBy($orderColumn, 'desc')->$firstOrGet();

        $dbInstance = $this->model->where($property)->orderBy($orderColumn)->$firstOrGet();

        if(!$dbInstance)
            return null;

        return $dbInstance->$returnedValue;
    }

    public function thenCreate(array $property,array $dataForUpdate, array $dataForSave):bool {

        if($this->model->where($property)->first()) {

            $this->model = $this->model->where($property)->first();
            if(!$this->model->update($dataForUpdate))
                return false;
        }

        else {
            if(!$this->model->fill($dataForSave)->save())
                return false;
        }

        return true;

    }

}
