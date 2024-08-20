<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\EnviarEmailRecuperacaoSenha;
use Exception;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Email;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Mail\VerificarMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function verificar(Request $request) //Código é bem parecido com LoginController@recuperarSenha
    {
        try{
            $ip = gethostbyname(gethostname());
            // $ip = $request->ip();
            if (!$request->get("token")) {
                return redirect()->route('login.index')
                    ->with('alert', ['mensagem' => 'Token não fornecido.', 'classe' => 'alert-danger show']);
            }
            //Bom se o token vem vazio, se não tiver isso acima, os usuarios que estão no banco gerados pela seeder são encontrado pela query
            //Tem que testar isso ai em cima direito, por algum motivo eu além ter feito acho que ta estranho.
            $token = $request->get("token");
            $email = Email::where('email_token', $token)->first();
            if (!$email) {
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'Token inválido ou e-mail já verificado.', 'classe' => 'alert-danger show']);
            }
            $ultima_solicitacao = $email->updated_at;
            $usuario = $email->usuario;
            //Diferença do horario do banco com o de agora, se for maior que 60
            if($ultima_solicitacao->diffInMinutes(now()) > 60){
                $email->email_token = Str::random(60);
                $email->save();
                Mail::to($usuario->email)->send(new VerificarMail($usuario, $ip));
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'O token foi invalidado. Um e-mail foi enviado, favor verificar sua caixa de entrada!', 'classe' => 'alert-danger show']);
            }
            $email->email_token = null;
            $email->save();
            $usuario->email_verificado = now();
            $usuario->save();
        }catch(Exception $e){
            return redirect()->route('login.index')
            ->with('alert', ['mensagem' => 'Ocorreu um erro inesperado', 'classe' => 'alert-danger show']);  
        }
        return redirect()->route('login.index')
        ->with('alert', ['mensagem' => 'E-mail verificado com sucesso!', 'classe' => 'alert-success show']);
    }
    public function emailNaoVerificado()
    {
        return view('auth.email.index')
        ->with('alert', ['mensagem' => 'O seu email não é verificado', 'classe' => 'alert-danger show']);
    }
    public function recuperarSenha(Request $request)
    {
        try{
            $ip = gethostbyname(gethostname());
            // $ip = $request->ip();
            $email = $request->input('email');
            $usuario = Usuario::where('email', $email)->first();
            if(!$usuario){
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'O email não existe no banco de dados', 'classe' => 'alert-danger show']);  
            }else if($usuario->email_verificado == null){
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'O seu email ainda não foi verificado, por favor verificar!', 'classe' => 'alert-danger show']);  
            }
            if($usuario->senhas->token != null && $usuario->senhas->updated_at->diffInMinutes(now()) < 60){
                $usuario->senhas->token = Str::random(60);
                $usuario->senhas->save();
                return redirect()->route('login.index')
                ->with('alert', ['mensagem' => 'No momento há uma solicitação disponivel, verifique o seu email', 'classe' => 'alert-success show']); 
            }
            $usuario->senhas->token = Str::random(60);
            $usuario->senhas->save();
            EnviarEmailRecuperacaoSenha::dispatch($usuario, $ip);
            return redirect()->route('login.index')
            ->with('alert', ['mensagem' => 'O email foi enviado com sucesso', 'classe' => 'alert-success show']);  
        }catch(Exception $e){
            return redirect()->route('login.index')
            ->with('alert', ['mensagem' => 'Ocorreu um erro inesperado', 'classe' => 'alert-danger show']);  
        }
    }
}