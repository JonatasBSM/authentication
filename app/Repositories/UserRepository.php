<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function store(array $data):bool {

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        if(!$user->save())
            return false;

       return true;
    }

    public function update(array $data):bool {

        $user = User::where('email', $data['email']);
        if(!$user->update([]))
            return false;

        return true;
    }

    public function findAndReturnAttributeByColumnName(string $column,mixed $value,string $orderColumn,bool $desc = false,string $returnedValue):mixed {

        if($desc)
            $dbInstance = User::where($column, $value)->orderBy($orderColumn, 'desc') ->first();

        $dbInstance = User::where($column, $value)->orderBy($orderColumn) ->first();

        if(!$dbInstance)
            return null;

        return $dbInstance->$returnedValue;
    }

}
