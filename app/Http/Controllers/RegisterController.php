<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {

        //Return register blade/component
        return ;
    }

    public function signUp(UserRepository $repository, RegisterRequest $request) {

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        return $repository->register($data);

    }
}
