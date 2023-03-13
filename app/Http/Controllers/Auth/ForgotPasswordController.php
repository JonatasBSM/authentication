<?php

namespace App\Http\Controllers\Auth;

use App\Events\RecoverPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Repository\Eloquent\PasswordResetTokensRepository;
use App\Repository\Interfaces\PasswordResetTokensInterface;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function  __construct(protected PasswordResetTokensInterface $repository)
    {

    }

    public function index() {

        //Return Forgot Password view/component
        return;
    }

    public function store(ForgotPasswordRequest $request) {
        return $this->repository->create($request->email);
    }

    public function update(ForgotPasswordRequest $request) {

        $data = [
            'email' => $request->email,
            'token' => $token = Str::random(100)
        ];

        return $this->repository->update($request->email, $data);
    }

    public function destroy(ForgotPasswordRequest $request) {
        return $this->repository->destroy($request->email);
    }


    public function show(ForgotPasswordRequest $request) {
        return $this->repository->find($request->email);
    }

    public function showAll() {
        return $this->repository->all();
    }

    public function thanCreate(ForgotPasswordRequest $request) {



        $token = Str::random(100);

        $this->repository->thenCreate(
            $request->email,
            ["token" => $token],
            ["email" => "jonatasbsmcarvalho@gmail.com", "token" => $token]
        );

          RecoverPasswordEvent::dispatch([
            'email' => $request->email,
            'link' => config('base_url').'/password-recover/reset/'.'token?token='.$token.'/email?email='.$request->email
        ]);


    }
}
