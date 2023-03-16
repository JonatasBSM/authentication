<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\UrlParameters\ResetPasswordIndexRequest;
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
    public function index(ResetPasswordIndexRequest $validator, Request $request)
    {
        $data = $validator->validate($request);

        if(!$data)
            redirect('http://127.0.0.1:8000/')->withErrors($data);

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
