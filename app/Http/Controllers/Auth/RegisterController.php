<?php

namespace App\Http\Controllers\Auth;

use App\Events\AccountConfirmationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function __construct(protected UserRepositoryInterface $repository)
    {

    }

    public function index() {

        //Return register view/component
        return ;
    }

    public function signUp(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data = array_merge($data,array('token' => Str::random(100)));

        if(!$this->repository->create($data))
            throw new \Exception("An error ocurred while registering your user, please try again later");


        AccountConfirmationEvent::dispatch([
            'email' => $data['email'],
            'token' => $data['token']
        ]);

    }
}
