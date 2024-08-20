<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SenhaAlteradaRequest extends FormRequest
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
            'senha' => 'required|min:4|confirmed',
        ];
    }
    public function messages(){
        return [
            'senha.required' => 'Por favor digite a senha.',
            'senha.min' => 'A senha tem que ter no minimo 4 caracteres',
            'senha.confirmed' => 'As senhas digitadas não são a mesma',
        ];
    }
}
