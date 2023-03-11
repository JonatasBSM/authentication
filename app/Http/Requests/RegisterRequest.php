<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:10|max:60|regex: /[aA-zZ]*\s*/',
            'email' => 'required|email',
            'password' => 'required|min:8|regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name can\'t be null',
            'name.string' => 'Name can only have letters',
            'name.min' => 'Name must have at least 10 letters',
            'name.max' => 'Name must have a maximum of 60 letters',
            'name.regex' => 'Name is not in the right format',

            'email.required' => 'Email can\'t be null',
            'email.email' => 'Email is not in the right format.',

            'password.required' => 'Password can\'t be null',
            'password.min:10' => 'Password must have at least 10 characters',
            'password.regex' => 'Password must have one letter, one number and one special character'
        ];
    }
}
