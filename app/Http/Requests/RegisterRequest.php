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
            'name' => 'required|string|min:10|max:60',
            'email' => 'required|email',
            'password' => 'required|min:8|regex: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.string' => 'O nome deve ser formado apenas por letras.',
            'name.min:10' => 'O nome deve ter no mínimo 10 letras.',
            'name.max:60' => 'O nome deve ter no máximo 60 letras.',

            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'O email digitado não está no formato correto.',

            'password.required' => 'O campo Senha é obrigatório.',
            'password.min:10' => 'A senha deve ter no mínimo 8 letras.',
            'password.regex' => 'A senha deve ter pelo menos uma letra, um número e um caractere especial'
        ];
    }
}
