<?php

namespace App\Http\Controllers;
use App\Models\User;
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

}
