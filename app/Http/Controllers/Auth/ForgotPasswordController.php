<?php

namespace App\Http\Controllers\Auth;

use App\Events\RecoverPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;

class ForgotPasswordController extends Controller
{
    public function index() {

        //Return Forgot Password view/component
        return;
    }

    public function recoverPassword(UserRepository $repository,ForgotPasswordRequest $request) {


        RecoverPasswordEvent::dispatch($request->email);


    }
}
