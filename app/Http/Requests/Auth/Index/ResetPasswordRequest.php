<?php

namespace App\Http\Requests\Auth\Index;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $redirect = '/';

    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'token' => $this->route('token'),
            'email' => $this->route('email')
        ]);
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
        ];
    }

    public function messages()
    {
        return [
            'token.required' => 'Token can\'t be null',
            'token.string' => 'Token must be string',
            'token.exists' => 'Token does not exist in our database',

            'email.required' => 'Email can\'t be null',
            'email.email' => 'Email is not in the right format.',
            'email.exists' => 'Email not registered in our database'
        ];
    }
}
