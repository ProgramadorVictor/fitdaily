<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperacaoDeSenha;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\ImagemModel;

class LoginController extends Controller
{
    public function login($mensagem = null, $classe = null){

        return view('login.index', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
    public function logar(Request $req){
        $login = $req->txtLogin;
        $senha = $req->txtSenha;
        
        $regras = [
            'txtLogin' => 'required|cpf',
            'txtSenha' => 'required'
        ];
        $feedback = [
            'txtLogin.required' => "O campo usuario deve ser preenchido.",
            'txtLogin.cpf' => "O CPF digitado é inválido.",
            'txtSenha.required' => "O campo de senha deve ser preenchido."
        ];
        
        //Esses CPFs exclusivos são gerados pela seeder, usuários para fins de teste.
        if($req->txtLogin != '999.999.999-99' && $req->txtLogin != '000.000.000-00'){
            $req->validate($regras, $feedback);
        }

        $usuario = Usuario::where('cpf', $login)->first();

        if($usuario){
            if(Hash::check($senha, $usuario->senha)){

                if(!ImagemModel::where('usuario_id', $usuario->id)->first()){
                    $imagem = new ImagemModel();
                    $imagem->usuario_id = $usuario->id;
                    $imagem->save();
                }
                $perfil_foto = ImagemModel::where('usuario_id', $usuario->id)->first();
                $caminho = str_replace('public/', '', $perfil_foto->caminho); 
                $sessao = [
                    'id' => $usuario->id,
                    'tipo' => $usuario->tipo,
                    'perfil_foto' => $caminho,
                    'nome' => $usuario->nome,
                    'sobrenome' => $usuario->sobrenome,
                    'email' => $usuario->email,
                    'celular' => $usuario->celular,
                ];
                Session::put("usuario", $sessao);
                return redirect()->route('tela-principal');
            }else{
                $mensagem = "Usuario ou senha incorretos.";
                $classe = "alert-danger show";
                return redirect()->route('login', ['mensagem' => $mensagem, 'classe' => $classe]);
            }
        }else{
            $mensagem = "Usuario ou senha incorretos.";
            $classe = "alert-danger show";
            return redirect()->route('login', ['mensagem' => $mensagem, 'classe' => $classe]);
        }

    }
    public function logout(){
        Session::forget("usuario");
        $mensagem = "Aguardamos você novamente, Volte mais tarde, estamos esperando!";
        $classe = "alert-success show";
        return redirect()->route('login', ['mensagem' => $mensagem, 'classe' => $classe]);
    }

    public function recuperarSenha(Request $req){
        $destino = $req->txtEmail;
        if(Usuario::where('email', $destino)->first()){
            $id = Usuario::where('email', $destino)->first(); $id = $id->id;
            $usuario = Usuario::find($id);
            
            $nome = $usuario->nome .' '. $usuario->sobrenome;
            Mail::to($destino)->send(new RecuperacaoDeSenha($nome));
            $mensagem = "O email foi enviado com sucesso";
            $classe = "alert-success show";

            return redirect()->route('login', ['mensagem' => $mensagem, 'classe' => $classe]);
        }else{
            $mensagem = "O email não existe no banco de dados";
            $classe = "alert-danger show";
            return redirect()->route('login', ['mensagem' => $mensagem, 'classe' => $classe]);
        }
    }
}
