<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetTokens extends Model
{
    protected $table = 'password_reset_tokens';
    protected $fillable = ['email', 'token'];
    public $timestamps = false;
    use HasFactory;

}
