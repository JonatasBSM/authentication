<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository implements UserRepositoryInterface
{

    public function __construct() {
        parent::__construct(new User());
    }

    public function getId(string $email)
    {
        $user = $this->model->where('email', '=', $email)->first();
        if(!$user)
            throw new \Exception('User not found.');

        return $user->id;
    }


}
