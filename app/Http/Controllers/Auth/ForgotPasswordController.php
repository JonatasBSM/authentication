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

    public function store(ForgotPasswordRequest $request) {

        $data = $request->validated();

        return $this->repository->create($data);
    }

    public function update(ForgotPasswordRequest $request) {

        $data = $request->validated();
        $token = Str::random(100);

        $this->repository->thenCreate(
            $data['email'],
            ["token" => $token],
            [$data['email'], "token" => $token]
        );

        RecoverPasswordEvent::dispatch([
            'email' => $request->email,
            'token' => $token
        ]);

    }

    public function destroy(ForgotPasswordRequest $request) {

        $data = $request->validated();

        return $this->repository->destroy($data);
    }


    public function show(ForgotPasswordRequest $request) {

        $data = $request->validated();

        return $this->repository->find($data);
    }

    public function showAll() {
        return $this->repository->all();
    }

}
