<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginRepository
{
    public function register(array $data) {

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        if(!$user->save())
            return throw new QueryException("Não foi possível cadastrar seu usuário");

       return true;
    }
}
