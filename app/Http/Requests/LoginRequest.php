<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:7'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O email é obrigatório',
            'email' => 'Insira um email válido',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha precisa ter no mínimo 8 dígitos'
        ];
    }
}
