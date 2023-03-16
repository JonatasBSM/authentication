<?php

namespace App\Http\Controllers\Auth;

use App\Events\RecoverPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Repository\Eloquent\PasswordResetTokensRepositoryRepository;
use App\Repository\Interfaces\PasswordResetTokensRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function  __construct(protected PasswordResetTokensRepositoryInterface $repository)
    {

    }

    public function index() {

        //Return Forgot Password view/component
        return;
    }

    public function sendEmail(ForgotPasswordRequest $request) {

        $data = $request->validated();
        $token = Str::random(100);

        $this->repository->thenCreate(
            $data['email'],
            ['token'=> $token],
            [
                'email' => $data['email'],
                'token' => $token
            ]
        );

        RecoverPasswordEvent::dispatch([
            'email' => $data['email'],
            'token' => $token
        ]);

    }

}
