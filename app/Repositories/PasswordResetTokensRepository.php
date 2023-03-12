<?php

namespace App\Repositories;

use App\Models\PasswordResetTokens;
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


    public function findAndReturnAttributeByColumnName(string $column,mixed $value,string $orderColumn,bool $desc = false,string $returnedValue):mixed {

        if($desc)
            $dbInstance = PasswordResetTokens::where($column, $value)->orderBy($orderColumn, 'desc') ->first();

        $dbInstance = PasswordResetTokens::where($column, $value)->orderBy($orderColumn) ->first();

        if(!$dbInstance)
            return null;

        return $dbInstance->$returnedValue;
    }
}
