<?php

namespace App\Http\Controllers\Auth;

use App\Events\RecoverPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Repositories\PasswordResetTokensRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;

class ForgotPasswordController extends Controller
{
    public function index() {

        //Return Forgot Password view/component
        return;
    }

    public function resetPassword(PasswordResetTokensRepository $repository,ForgotPasswordRequest $request) {

        if(!$repository->store($request->email))
            throw new QueryException('An error ocurred while registering your reset token, please try again later');

        $token = $repository->findAndReturnAttributeByColumnName(
            'email', $request->email, 'created_at', true, 'token'
        );

        RecoverPasswordEvent::dispatch([
            'email' => $request->email,
            'link' => config('base_url').'/password-recover/'.$token.'?'.'email='.$request->email
        ]);


    }
}
