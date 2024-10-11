<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome_completo' => 'required',
            'email' => 'required|email|unique:usuarios,email|confirmed',
            'cpf' => 'required|cpf|unique:usuarios,cpf',
            'celular' => 'required|celular_com_ddd',
            'senha' => 'required|min:4|alphadash|confirmed',
            'nascimento' => 'required|date_format:d/m/Y|before_or_equal:' . now()->format('d/m/Y'),
        ];
    }
    public function messages()
    {
        return [
            'nome_completo.required' => 'O campo nome é requerido.',
            'email.required' => 'O campo email é requerido.',
            'email.unique' => 'O email ja existe no banco de dados.',
            'email.email' => 'O campo email deve ser um email.',
            'email.confirmed' => 'O campo de confirmação de email é requerido.',
            'cpf.required' => 'O campo CPF é requerido.',
            'cpf.unique' => 'O CPF ja existe no banco de dados.',
            'cpf.cpf' => 'O campo CPF é inválido.',
            'celular.required' => 'O campo celular é requerido.',
            'celular.celular_com_ddd' => 'O campo celular é inválido.',
            'senha.required' => 'O campo senha é requerido.',
            'senha.min' => 'O campo senha tem que ter no minimo 4 caracteres.',
            'senha.alphadash' => 'O campo senha não deve ter simbolos: @*$#&%!.',
            'senha.confirmed' => 'O campo confirmação de senha é requerido.',
            'nascimento.required' => 'O campo nascimento é requerido.',
            'nascimento.date_format' => 'O campo nascimento é inválido.',
            'nascimento.before_or_equal' => 'O campo de nascimento é maior que o atual.'
        ];
    }
}
