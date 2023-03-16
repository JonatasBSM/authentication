<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:8|regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/|confirmed',
            'id' => 'exists:User'
        ];
    }

    public function messages() {
        return [

            'password.required' => 'Password can\'t be null',
            'password.min:10' => 'Password must have at least 10 characters',
            'password.regex' => 'Password must have one letter, one number and one special character',
            'password.confirmed' => 'Passwords need to be equal',

            'id.exists' => 'ID not found'
        ];
    }
}
