<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{
    public function index() {

        //Return register view/component
        return ;
    }

    public function signUp(UserRepository $repository, RegisterRequest $request) {

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if(!$repository->store($data))
            return throw new QueryException("User could not me registered.");

        return true;

    }
}
