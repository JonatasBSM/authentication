<?php

namespace App\Http\Controllers\Auth;

use App\Events\RecoverPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Repositories\PasswordResetTokensRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index() {

        //Return Forgot Password view/component
        return;
    }

    public function resetPassword(PasswordResetTokensRepository $repository,ForgotPasswordRequest $request) {



        $token = Str::random(100);

        $repository->thenCreate(
            ["email" => $request->email],
            ["token" => $token],
            ["email" => "jonatasbsmcarvalho@gmail.com", "token" => $token]
        );

        $token = $repository->find(
            ['email' => $request->email],
            'created_at',
            'token'
        );

          RecoverPasswordEvent::dispatch([
            'email' => $request->email,
            'link' => config('base_url').'/password-recover/'.$token.'?'.'email='.$request->email
        ]);


    }
}
