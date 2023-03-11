<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\LoginRepository;
use http\Exception\BadQueryStringException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {

        //Return login view/component
        return ;
    }

    public function signIn(Request $request) {

        if(!Auth::attempt())
            return redirect()->back()->withErrors(["Usuário ou senha inválidos"]);
    }

    public function register(LoginRepository $repository, RegisterRequest $request) {

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        return $repository->register($data);

    }
}
