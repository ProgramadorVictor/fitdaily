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
        return view('cadastro.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
    }
    public function cadastrar(Request $req){
         //validate cpf não é oficial do laravel, é uma api rest feita por brasileiros, aqui está o site: https://github.com/LaravelLegends/pt-br-validator
        $regras = [
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'confirmacaodeemail' => 'required|same:email',
            'cpf' => 'required|cpf|unique:usuarios,cpf',
            'celular' => 'required|celular_com_ddd',
            'senha' => 'required|min:8|alphadash',
            'confirmacaodesenha' => 'required|same:senha',
            'nascimento' => 'required',
        ];
        $feedback =[
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
            'senha.min' => 'O campo senha tem que ter no minimo 8 caracteres.',
            'senha.alphadash' => 'O campo senha não deve ter simbolos: @*$#&%!.',
            'confirmacaodesenha.required' => 'O campo de confirmação de senha é requerido.',
            'confirmacaodesenha.same' => 'O campo de confirmação de senha tem que ser igual a senha.',
            'nascimento.required' => 'O campo nascimento é requerido.',
        ];
        $req->validate($regras, $feedback);
        try{
            $usuario = new Usuario();
            $usuario->fill($req->all());
            $usuario->senha = Hash::make($req->senha);
            $usuario->save();
            $mensagem = "Seu cadastro foi realizado com sucesso.";
            $classe = 'alert-success show';
            return redirect()->route('login')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
        }catch(QueryException $e){
            $mensagem = "Ocorreu um erro ao realizar o cadastro.";
            $classe = 'alert-danger show';
            return redirect()->route('cadastro')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
        }
    }
}
