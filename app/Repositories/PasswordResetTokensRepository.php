<?php

namespace App\Repositories;

use App\Models\PasswordResetTokens;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class PasswordResetTokensRepository
{
    public function store(string $email):bool {
        $PasswordResetTokens = new PasswordResetTokens([
            'email' => $email,
            'token' => Str::random(100)
        ]);

        if(!$PasswordResetTokens->save())
            return false;

        return true;
    }


    public function findAndReturn(array $column,string $orderColumn,string $returnedValue, bool $desc = false):mixed {

        if($desc)
            $dbInstance = PasswordResetTokens::where($column)->orderBy($orderColumn, 'desc')->first();

        $dbInstance = PasswordResetTokens::where($column)->orderBy($orderColumn)->first();

        if(!$dbInstance)
            return null;

        return $dbInstance->$returnedValue;
    }

    public function thenCreate(string $table, array $property,array $dataForUpdate, array $dataForSave) {

        $namespace = 'App\Models';
        $fullPath = $namespace."\\$table";
        $model = new $fullPath();

        if($model->where($property)->first()) {

            $model = $model->where($property)->first();
            if(!$model->update($dataForUpdate))
                return false;
        }

        else {
            if(!$model->fill($dataForSave)->save())
                return false;
        }

        return true;



    }

}
