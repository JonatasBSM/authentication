<?php

namespace App\Repository\Eloquent;

use App\Models\PasswordResetTokens;
use App\Repository\Interfaces\PasswordResetTokensInterface;
use Illuminate\Support\Str;

class PasswordResetTokensRepository extends Repository implements PasswordResetTokensInterface
{
    public function create($email) {
        $PasswordResetTokens = new PasswordResetTokens([
            'email' => $email,
            'token' => Str::random(100)
        ]);

        if(!$PasswordResetTokens->save())
            return false;

        return true;
    }


}
