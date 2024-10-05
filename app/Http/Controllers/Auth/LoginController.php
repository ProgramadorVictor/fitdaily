<?php

namespace App\Http\Controllers\Auth;

use App\Events\RecuperarSenhaEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogarUsuarioRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\SenhaAlteradaRequest;
use Illuminate\Http\Request;
use App\Models\Imagem;
use App\Models\Usuario;
use App\Events\VerificarEmailEvent;
use App\Http\Message;
use App\Models\Email;
use App\Models\Senha;
use Exception;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }
    public function logar(LogarUsuarioRequest $request)
    {
        $validated = $request->validated();
        $credenciais = [
            'cpf' => $validated['cpf'],
            'password' => $validated['senha']
        ];
        if(Auth::attempt($credenciais) == false){
            return Message::danger('Usuario ou senha incorretos.', 'login.index')->withInput();
        }
        try{
            Imagem::firstOrCreate(['usuario_id' => auth()->user()->id]);
            return Message::success('Seja bem vindo (a) ','tela-principal', auth()->user()->nome_completo);
        }catch(QueryException $e){
            return Message::exception($e->getMessage(), 'login.index');
        }
    }
    public function logout()
    {
        auth()->logout();
        return Message::success('Aguardamos você novamente, Volte mais tarde, estamos esperando!','login.index');
    }
    public function verificar(Request $request){
        $request->validate([
            'token' => 'required|min:60|max:60'
        ],[
            'required' => 'O campo :attribute é requerido.'
        ]);
        $token = $request->input('token');
        $email = Email::buscarToken($token)->first();
        if($email){
            $usuario = $email->usuario;
            $usuario->email_verificado = now();
            $usuario->save();
            return Message::success('Email verificado com sucesso!','login.index');
        }
        return Message::success('Token é inválido!','alert-success show');
    }
    public function recuperar(Request $request) 
    {
        $email = $request->input('email');
        $usuario = Usuario::where('email', $email)->first();
        if(!$usuario){
            return Message::danger('O usuario não existe.', 'login.index');
        }
        if(is_null($usuario->email_verificado)){
            return $this->emailNaoVerificado($usuario);
        }
        return $this->recuperarSenha($usuario);
    }
    public function alterarSenha(SenhaAlteradaRequest $req)
    {
        try{
            $senha = Senha::where('token', $req->input('token'))->first();
            $senha->token = null;
            $senha->usuario->senha = Hash::make($req->input('senha'));
            $senha->save();
            $senha->usuario->save();
        }catch(Exception $e){
            return Message::exception($e->getMessage(), 'login.index');
        }
        return Message::success('Sua senha foi alterada com sucesso!','login.index');
    }
    /*
    |--------------------------------------------------------------------------
    | Abaixos são funções que estão dentro dos métodos do próprio controller.
    |--------------------------------------------------------------------------
    */
    private function emailNaoVerificado($usuario){
        $email = $usuario->emails()->first();
        $email->email_token = Str::random(60);
        $email->save();
        $dados = [
            'nome_completo' => $usuario->nome_completo,
            'email' => $usuario->email,
            'token' => $email->email_token
        ];
        event(new VerificarEmailEvent($dados));
        return Message::danger('O seu email não foi verificado, verifique a caixa de email.', 'login.index');
    }
    private function recuperarSenha($usuario){
        $senha = $usuario->senhas()->first();
        $senha->token = Str::random(60);
        $senha->save();
        $dados = [
            'nome_completo' => $usuario->nome_completo,
            'email' => $usuario->email,
            'token' => $senha->token
        ];
        event(new RecuperarSenhaEvent($dados));
        return Message::success('Foi enviado um email para recuperação de senha!','login.index');
    }
}
