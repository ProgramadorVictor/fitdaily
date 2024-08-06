<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperacaoDeSenha;
use App\Models\Usuario;
use App\Models\Imagem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login($mensagem = null, $classe = null){
        $dados = [
            "mensagem" => $mensagem,
            "classe" => $classe
        ];
        return view('login.index')->with('alert', ['dados' => $dados]);  
    }
    public function logar(Request $req){
        $cpf = $req->cpf;
        $senha = $req->senha;
        $regras = [
            'cpf' => 'required|cpf',
            'senha' => 'required'
        ];
        $feedback = [
            'cpf.required' => "O campo usuario deve ser preenchido.",
            'cpf.cpf' => "O CPF digitado é inválido.",
            'senha.required' => "O campo de senha deve ser preenchido."
        ];
        $acesso_liberado = [
            '999.999.999-99',
            '000.000.000-00',
            '111.111.111-11',
        ];
        $acesso = false;
        foreach($acesso_liberado as $liberar){
            if($req->cpf == $liberar){
                $acesso = true;
                break;
            }
        }
        if(!$acesso){
            $req->validate($regras, $feedback);
        }
        $usuario = Usuario::where('cpf', $cpf)->first();
        if($usuario && Hash::check($senha, $usuario->senha)){
            if(!Imagem::where('usuario_id', $usuario->id)->first()){
                $imagem = new Imagem();
                $imagem->usuario_id = $usuario->id;
                $imagem->save();
            }
            $caminho = Imagem::where('usuario_id', $usuario->id)->first();
            $perfil_foto = str_replace('public/', '', $caminho->caminho);
            //Analisar esse código de criar sessão
            $usuario->makeHidden(['cpf', 'senha', 'data_inicio_academia','data_fim_academia','created_at','updated_at']);
            $sessao = $usuario->toArray();
            $sessao['perfil_foto'] = $perfil_foto;
            if(isset($sessao['tipo_de_conta_id'])){
                $sessao['tipo_de_conta'] = $sessao['tipo_de_conta_id'];
                unset($sessao['tipo_de_conta_id']);
            }
            //Até aqui
            Session::put("usuario", $sessao);
            $dados = [
                'mensagem' => "Seja bem-vindo (a), ". session('usuario')['nome']." ".session('usuario')['sobrenome'],
                'classe' => 'alert-success show'
            ];
            return redirect()->route('tela-principal')->with('alert', ['dados' => $dados]);  
        }else{
            $dados = [
                'mensagem' => "Usuario ou senha incorretos",
                'classe' => 'alert-danger show'
            ];
            return redirect()->route('login')->with('alert', ['dados' => $dados]);
        }
    }
    public function logout(){
        Session::forget("usuario");
        $dados = [
            'mensagem' => "Aguardamos você novamente, Volte mais tarde, estamos esperando!",
            'classe' => 'alert-success show'
        ];
        return redirect()->route('login')->with('alert', ['dados' => $dados]);  
    }
    public function recuperarSenha(Request $req){
        $destino = $req->email;
        if(Usuario::where('email', $destino)->first()){
            $id = Usuario::where('email', $destino)->first(); $id = $id->id;
            $usuario = Usuario::find($id);
            $nome = $usuario->nome .' '. $usuario->sobrenome;
            Mail::to($destino)->send(new RecuperacaoDeSenha($nome));
            $dados = [
                'mensagem' => "O email foi enviado com sucesso",
                'classe' => 'alert-success show'
            ];
            return redirect()->route('login')->with('alert', ['dados' => $dados]);  
        }else{
            $dados = [
                'mensagem' => "O email não existe no banco de dados",
                'classe' => 'alert-danger show'
            ];
            return redirect()->route('login')->with('alert', ['dados' => $dados]);  
        }
    }
}
