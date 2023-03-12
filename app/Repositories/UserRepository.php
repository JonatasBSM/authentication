<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function store(array $data) {

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        if(!$user->save())
            return false;

       return true;
    }

    public function update(array $data) {

        $user = User::where('email', $data['email']);
        if(!$user->update([]))
            return false;

        return true;
    }

}
