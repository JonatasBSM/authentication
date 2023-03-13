<?php

namespace App\Repositories;

use App\Models\PasswordResetTokens;

class repository
{
    public function findAndReturn(
        string $modelName, array $property,string $orderColumn,string $returnedValue, bool $desc = false, string $firstOrGet = 'first'
    ):mixed {

        $modelInstance = $this->getModel($modelName);

        if($desc)
            $dbInstance = $modelInstance->where($property)->orderBy($orderColumn, 'desc')->$firstOrGet();

        $dbInstance = $modelInstance->where($property)->orderBy($orderColumn)->$firstOrGet();

        if(!$dbInstance)
            return null;

        return $dbInstance->$returnedValue;
    }

    public function thenCreate(string $modelName, array $property,array $dataForUpdate, array $dataForSave):bool {

        $modelInstance = $this->getModel($modelName);

        if($modelInstance->where($property)->first()) {

            $modelInstance = $modelInstance->where($property)->first();
            if(!$modelInstance->update($dataForUpdate))
                return false;
        }

        else {
            if(!$modelInstance->fill($dataForSave)->save())
                return false;
        }

        return true;

    }

    public function getModel(string $modelName):mixed {
        $namespace = 'App\Models';
        $fullPath = $namespace."\\$modelName";
        $modelInstance = new $fullPath();

        return $modelInstance;
    }
}
