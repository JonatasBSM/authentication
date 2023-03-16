<?php

namespace App\Http\Requests\Auth\UrlParameters;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ResetPasswordIndexRequest
{
    private array $rules;
    private ?array $messages;


    public function __construct(Request $request) {

        $this->rules = [
            'email' => 'required|email|exists:password_reset_tokens',
            'token' => 'required|string|exists:password_reset_tokens'
        ];

        $this->messages = [
            'token.required' => 'Token can\'t be null',
            'token.string' => 'Token must be string',
            'token.exists' => 'Token does not exist in our database',

            'email.required' => 'Email can\'t be null',
            'email.email' => 'Email is not in the right format.',
            'email.exists' => 'Email not registered in our database'
        ];

    }

    public function validate(Request $request) {
        $result = validator($request->route()->parameters(), $this->rules, $this->messages);

        if($result->fails())
           return redirect('/')->withErrors($result->errors()->first());

        return $result->validate();
    }
}
