<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministradorRequest extends FormRequest
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
            'cpf' => 'required',
            'senha' => 'required',
        ];
    }
    public function messages(){
        return [
            'cpf.required' => 'O cpf deve ser digitado.',
            'senha.required' => 'A senha deve ser digitada.',
        ];
    }
}
