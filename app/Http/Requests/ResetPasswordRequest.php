<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required|string|exists:password_reset_tokens',
            'email' => 'required|email|exists:password_reset_tokens',
            'password' => 'required|min:8|regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/|confirmed'
        ];
    }

    public function messages() {
        return [
            'token.required' => 'Token can\'t be null',
            'token.string' => 'Token must be string',
            'token.exists' => 'Token does not exist in our database',

            'email.required' => 'Email can\'t be null',
            'email.email' => 'Email is not in the right format.',
            'email.exists' => 'Email not registered in our database',

            'password.required' => 'Password can\'t be null',
            'password.min:10' => 'Password must have at least 10 characters',
            'password.regex' => 'Password must have one letter, one number and one special character',
            'password.confirmed' => 'Passwords need to be equal'
        ];
    }
}
