<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CadastroRequest;
use Illuminate\Support\Str;
use App\Models\Email;
use App\Models\Senha;
use App\Jobs\EnviarEmailVerificacao;
use Request;

class CadastroController extends Controller
{
    public function index(){
        return view('auth.cadastro.index')->with('alert', ['mensagem' => '', 'classe' => '']);
    }
    public function cadastrar(CadastroRequest $request){
        $ip = gethostbyname(gethostname()); //Pega o ip da maquina em desenvolvimento
        try{
            $validados = $request->validated();
            $data = explode("/", $validados['nascimento']);
            $data_formatada = $data[2]."-".$data[1]."-".$data[0];
            if ($data[2] >= now()->year) {
                return redirect()->route('cadastro.index')
                ->with('alert', ['mensagem' => 'Data de nascimneto inválida.', 'classe' => 'alert-danger show']);
            }
            $validados['nascimento'] = $data_formatada;
            $validados['senha'] = Hash::make($validados['senha']);
            $usuario = Usuario::create($validados);
            Email::create([
                'usuario_id' => $usuario->id,
                'email_token' => Str::random(60)
            ]);
            Senha::create([
                'usuario_id' => $usuario->id,
                'token' => null,
            ]);
            EnviarEmailVerificacao::dispatch($usuario, $ip);
            return redirect()->route('login.index')
            ->with('alert', ['mensagem' => 'Cadastro realizado com sucesso!', 'classe' => 'alert-success show']);  
        }catch(QueryException $e){
            return redirect()->route('cadastro.index')
            ->with('alert', ['mensagem' => 'Ocorreu um erro inesperado, por favor reporte ao email contato.fitdaily@gmail.com', 'classe' => 'alert-danger show']);
        }
    }
}
