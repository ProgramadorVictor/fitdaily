<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Imagem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Senha;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperarSenhaMail;
use App\Http\Requests\SenhaAlteradaRequest;

class LoginController extends Controller
{
    public function index()
    {
        session()->forget('usuario'); session()->forget('admin');
        return view('auth.login.index')->with('alert', ['mensagem' => '', 'classe' => '']);
    }
    public function logar(Request $req)
    {
        try{
            $cpf = $req->cpf;
            $senha = $req->senha;
            $usuario = Usuario::where('cpf', $cpf)->first();
            if($usuario && Hash::check($senha, $usuario->senha)){
                $regras = [
                    'cpf' => 'required|cpf',
                    'senha' => 'required'
                ];
                $feedback = [
                    'cpf.required' => "O campo usuario deve ser preenchido.",
                    'cpf.cpf' => "O CPF digitado é inválido.",
                    'senha.required' => "O campo de senha deve ser preenchido."
                ];
                //Cpfs gerados pela seeder
                $acesso_liberado = [
                    '999.999.999-99',
                    '000.000.000-00',
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
                //Fim do código.
                //Primeiro login
                if(!Imagem::where('usuario_id', $usuario->id)->first()){
                    $imagem = new Imagem();
                    $imagem->usuario_id = $usuario->id;
                    $imagem->save();
                }
                //Fim primeiro login
                $imagem = Imagem::where('usuario_id', $usuario->id)->first();
                $sessao = $usuario->toArray();
                $sessao['imagem'] = str_replace('public/', '', $imagem->imagem);
                Session::put("usuario", $sessao);
                return redirect()->route('tela-principal')
                ->with('alert', ['mensagem' => "Seja bem-vindo (a), ". session('usuario')['nome']." ".session('usuario')['sobrenome'], 'classe' => 'alert-success show']);  
            }else{
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'Usuario ou senha incorretos', 'classe' => 'alert-danger show']);
            }
        }catch(Exception $e){
            return redirect()->route('login.index')
            ->with('alert', ['mensagem' => 'Ocorreu um erro inesperado.', 'classe' => 'alert-danger show']);
        }
    }
    public function logout()
    {
        session()->forget("usuario");
        return redirect()->route('login.index')
        ->with('alert', ['mensagem' => "Aguardamos você novamente, Volte mais tarde, estamos esperando!",'classe' => 'alert-success show']);  
    }
    public function recuperarSenha(Request $request)  //Código é bem parecido com EmailController@verificar
    {
        try{
            $ip = gethostbyname(gethostname()); //ótimo para ambiente de desenvolvimento.
            // $ip = $request->ip();
            if(!$request->get("token")) {
                return redirect()->route('login.index')
                    ->with('alert', ['mensagem' => 'Token não fornecido.', 'classe' => 'alert-danger show']);
            }
            $token = $request->get("token");
            $senha = Senha::where('token', $token)->first();
            if(!$senha) {
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'O token fornecido é inválido.', 'classe' => 'alert-danger show']);
            }
            $ultima_solicitacao = $senha->updated_at;
            $usuario = $senha->usuario;
            if($ultima_solicitacao->diffInMinutes(now()) > 60){
                $senha->token = Str::random(60);
                $senha->save();
                Mail::to($usuario->email)->send(new RecuperarSenhaMail($usuario, $ip));
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'O token foi invalidado. Um e-mail foi enviado, favor verificar sua caixa de entrada!', 'classe' => 'alert-danger show']);
            }
            return view('auth.login.recuperar-senha')->with('token', $token);;
        }catch(Exception $e){
            return redirect()->route('cadastro.index')
            ->with('alert', ['mensagem' => 'Ocorreu um erro inesperado.', 'classe' => 'alert-danger show']);
        }
    }
    public function senhaAlterada(SenhaAlteradaRequest $req)
    {
        try{
            $senha = Senha::where('token', $req->input('token'))->first();
            $senha->token = null;
            $senha->usuario->senha = Hash::make($req->input('senha'));
            $senha->save();
            $senha->usuario->save();
        }catch(Exception $e){
            return redirect()->route('login.index')->with('alert', ['mensagem' => "Ocorreu um erro inesperado", 'classe' => 'alert-danger show']);
        }
        return redirect()->route('login.index')->with('alert', ['mensagem' => "Sua senha foi alterada com sucesso", 'classe' => 'alert-success show']);
    }
}
