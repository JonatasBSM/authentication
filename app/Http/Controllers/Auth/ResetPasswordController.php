<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    public function __construct(protected UserRepositoryInterface $repository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        return view()->with(['token' => $data['token'], 'email' => $data['email']]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResetPasswordRequest $request)
    {

        $data = $request->validated();
        $id = $this->repository->getId($data['email']);


        if($this->repository->find($id))
            return $this->repository->update(
                $data['email'],
                ["password" => $data['password']]
            );

        return true;
    }

}
