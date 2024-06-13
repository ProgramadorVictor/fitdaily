<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class CadastroController extends Controller
{
    public function cadastro($mensagem = null, $classe = null){
        return view('cadastro.index', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
    public function cadastrar(Request $req){
         //validate cpf não é oficial do laravel, é uma api rest feita por brasileiros, aqui está o site: https://github.com/LaravelLegends/pt-br-validator
        $regras = [
            'txtNome' => 'required',
            'txtSobrenome' => 'required',
            'txtEmail' => 'required|email|unique:usuarios,email',
            'txtConfirmacaoDeEmail' => 'required|same:txtEmail',
            'txtCPF' => 'required|cpf|unique:usuarios,cpf',
            'txtCelular' => 'required|celular_com_ddd',
            'txtSenha' => 'required|min:8|alphadash',
            'txtConfirmacaoDeSenha' => 'required|same:txtSenha',
            'txtNascimento' => 'required',
        ];
        $feedback =[
            'txtNome.required' => 'O campo nome é requerido.',
            'txtSobrenome.required' => 'O campo sobrenome é requerido.',
            'txtEmail.required' => 'O campo email é requerido.',
            'txtEmail.unique' => 'O email ja existe no banco de dados.',
            'txtEmail.email' => 'O campo email deve ser um email.',
            'txtConfirmacaoDeEmail.required' => 'O campo de confirmação de email é requerido.',
            'txtConfirmacaoDeEmail.same' => 'O campo de confirmação de email tem que ser igual a email.',
            'txtCPF.required' => 'O campo CPF é requerido.',
            'txtCPF.unique' => 'O CPF ja existe no banco de dados.',
            'txtCPF.cpf' => 'O campo CPF é inválido.',
            'txtCelular.required' => 'O campo celular é requerido.',
            'txtCelular.celular_com_ddd' => 'O campo celular é inválido.',
            'txtSenha.required' => 'O campo senha é requerido.',
            'txtSenha.min' => 'O campo senha tem que ter no minimo 8 caracteres.',
            'txtSenha.alphadash' => 'O campo senha não deve ter simbolos: @*$#&%!.',
            'txtConfirmacaoDeSenha.required' => 'O campo de confirmação de senha é requerido.',
            'txtConfirmacaoDeSenha.same' => 'O campo de confirmação de senha tem que ser igual a senha.',
            'txtNascimento.required' => 'O campo nascimento é requerido.',2
        ];
        $req->validate($regras, $feedback);
        try{
            $usuario = new Usuario();
            $usuario->nome = $req->txtNome;
            $usuario->sobrenome = $req->txtSobrenome;
            $usuario->email = $req->txtEmail;
            $usuario->CPF = $req->txtCPF;
            $usuario->celular = $req->txtCelular;
            $usuario->senha = Hash::make($req->txtSenha);
            $usuario->nascimento = $req->txtNascimento;
            $usuario->save();
            $mensagem = "Seu cadastro foi realizado com sucesso.";
            $classe = 'alert-success show';
            return redirect()->route('login', ['mensagem' => $mensagem, 'classe' => $classe]);
        }catch(QueryException $e){
            $mensagem = "Ocorreu um erro ao realizar o cadastro.";
            $classe = 'alert-danger show';
            return redirect()->route('cadastro',['mensagem' => $mensagem, 'classe' => $classe]);
        }
    }
}
