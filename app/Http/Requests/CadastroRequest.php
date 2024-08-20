<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
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
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'confirmacaodeemail' => 'required|same:email',
            'cpf' => 'required|cpf|unique:usuarios,cpf',
            'celular' => 'required|celular_com_ddd',
            'senha' => 'required|min:4|alphadash',
            'confirmacaodesenha' => 'required|same:senha',
            'nascimento' => 'required|date_format:d/m/Y',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é requerido.',
            'sobrenome.required' => 'O campo sobrenome é requerido.',
            'email.required' => 'O campo email é requerido.',
            'email.unique' => 'O email ja existe no banco de dados.',
            'email.email' => 'O campo email deve ser um email.',
            'confirmacaodeemail.required' => 'O campo de confirmação de email é requerido.',
            'confirmacaodeemail.same' => 'O campo de confirmação de email tem que ser igual a email.',
            'cpf.required' => 'O campo CPF é requerido.',
            'cpf.unique' => 'O CPF ja existe no banco de dados.',
            'cpf.cpf' => 'O campo CPF é inválido.',
            'celular.required' => 'O campo celular é requerido.',
            'celular.celular_com_ddd' => 'O campo celular é inválido.',
            'senha.required' => 'O campo senha é requerido.',
            'senha.min' => 'O campo senha tem que ter no minimo 4 caracteres.',
            'senha.alphadash' => 'O campo senha não deve ter simbolos: @*$#&%!.',
            'confirmacaodesenha.required' => 'O campo de confirmação de senha é requerido.',
            'confirmacaodesenha.same' => 'O campo de confirmação de senha tem que ser igual a senha.',
            'nascimento.required' => 'O campo nascimento é requerido.',
            'nascimento.date' => 'O campo nascimento é inválido.',
        ];
    }
}
