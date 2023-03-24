<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\Index\ResetPasswordRequest;
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
        $id = $this->repository->getId($data['email']);
        return view('auth.reset-password-index')->with(['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResetPasswordRequest $request)
    {

        $data = $request->validated();

        return $this->update(
            $data['id'],
            ["password" => $data['password']]
        );
    }

}
