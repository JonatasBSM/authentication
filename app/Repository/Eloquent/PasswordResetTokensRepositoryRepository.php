<?php

namespace App\Repository\Eloquent;

use App\Models\PasswordResetTokens;
use App\Repository\Interfaces\PasswordResetTokensRepositoryInterface;
use Illuminate\Support\Str;

class PasswordResetTokensRepositoryRepository extends Repository implements PasswordResetTokensRepositoryInterface
{

    public function __construct() {
        parent::__construct(new PasswordResetTokens());
    }

}
