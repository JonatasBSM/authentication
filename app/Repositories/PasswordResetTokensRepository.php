<?php

namespace App\Repositories;

use App\Models\PasswordResetTokens;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class PasswordResetTokensRepository extends repository
{
    public function store(string $email):bool {
        $PasswordResetTokens = new PasswordResetTokens([
            'email' => $email,
            'token' => Str::random(100)
        ]);

        if(!$PasswordResetTokens->save())
            return false;

        return true;
    }

}
