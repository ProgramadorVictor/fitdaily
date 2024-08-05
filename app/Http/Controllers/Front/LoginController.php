<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperacaoDeSenha;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Front\ImagemController;


class LoginController extends Controller
{
    public function login($mensagem = null, $classe = null){

        return view('login.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
    }
    public function logar(Request $req){
        $login = $req->login;
        $senha = $req->senha;
        
        $regras = [
            'login' => 'required|cpf',
            'senha' => 'required'
        ];
        $feedback = [
            'login.required' => "O campo usuario deve ser preenchido.",
            'login.cpf' => "O CPF digitado é inválido.",
            'senha.required' => "O campo de senha deve ser preenchido."
        ];
        
        //Esses CPFs exclusivos são gerados pela seeder, usuários para fins de teste.
        $acesso_liberado = [
            '999.999.999-99',
            '000.000.000-00',
            '111.111.111-11',
        ];
        
        $acesso = false;
        foreach($acesso_liberado as $liberar){
            if($req->login == $liberar){
                $acesso = true;
                break;
            }
        }
        
        if(!$acesso){
            $req->validate($regras, $feedback);
        }
        //Melhoria nos logins para CPFs exclusivos.

        $usuario = Usuario::where('cpf', $login)->first();

        if($usuario){
            if(Hash::check($senha, $usuario->senha)){

                $caminho = ImagemController::primeiroLogin($usuario);

                $sessao = [
                    'id' => $usuario->id,
                    'tipo_de_conta' => $usuario->tipo_de_conta_id,
                    'perfil_foto' => $caminho,
                    'nome' => $usuario->nome,
                    'sobrenome' => $usuario->sobrenome,
                    'email' => $usuario->email,
                    'celular' => $usuario->celular,
                ];

                Session::put("usuario", $sessao);

                $mensagem = "Seja bem-vindo (a), ". session('usuario')['nome']." ".session('usuario')['sobrenome'];
                $classe = "alert-success show";

                return redirect()->route('tela-principal')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
            }else{
                $mensagem = "Usuario ou senha incorretos.";
                $classe = "alert-danger show";
                return redirect()->route('login')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
            }
        }else{
            $mensagem = "Usuario ou senha incorretos.";
            $classe = "alert-danger show";
            return redirect()->route('login')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
        }

    }
    public function logout(){
        Session::forget("usuario");
        $mensagem = "Aguardamos você novamente, Volte mais tarde, estamos esperando!";
        $classe = "alert-success show";
        return redirect()->route('login')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
    }

    public function recuperarSenha(Request $req){
        $destino = $req->email;
        if(Usuario::where('email', $destino)->first()){
            $id = Usuario::where('email', $destino)->first(); $id = $id->id;
            $usuario = Usuario::find($id);
            
            $nome = $usuario->nome .' '. $usuario->sobrenome;
            Mail::to($destino)->send(new RecuperacaoDeSenha($nome));
            $mensagem = "O email foi enviado com sucesso";
            $classe = "alert-success show";

            return redirect()->route('login')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
        }else{
            $mensagem = "O email não existe no banco de dados";
            $classe = "alert-danger show";
            return redirect()->route('login')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);  
        }
    }
}
