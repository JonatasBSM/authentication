<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:Users, email'
        ];
    }

    public function messages():array {
        return [
            'email.required' => 'Email can\'t be null',
            'email.email' => 'Email is not in the right format.',
            'email.exists' => 'Email not registered in our database'
        ];
    }
}
