<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastrarUsuarioRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario;
use App\Models\Email;
use App\Models\Senha;
use App\Events\VerificarEmailEvent;

class CadastroController extends Controller
{
    public function index(){
        return view('auth.cadastro.index');
    }
    public function cadastrar(CadastrarUsuarioRequest $request){
        $validated = $request->validated();
        $validated['nascimento'] = format_data($request->input('nascimento'));
        $validated['senha'] = Hash::make($validated['senha']);
        try{
            $dados = [];
            DB::transaction(function() use ($validated, &$dados) {
                $usuario = Usuario::create($validated); $id = $usuario->id;
                $email = Email::create([
                    'usuario_id' => $id,
                    'email_token' => Str::random(60)
                ]);
                Senha::create([
                    'usuario_id' => $id
                ]);
                $dados = [
                    'nome_completo' => $usuario->nome_completo,
                    'email' => $usuario->email,
                    'token' => $email->email_token
                ];
            });
            event(new VerificarEmailEvent($dados));
            Log::info('Status: Usuario cadastrado com sucesso!');
            return redirect()->route('login.index')->with('alert', [
                'mensagem' => 'Cadastro realizado com sucesso!',
                'classe' => 'alert-success show'
            ]);  
        }catch(QueryException $e){
            Log::error('Status: Erro ao cadastrar usuário: '.$e->getMessage());
            return redirect()->route('cadastro.index')->with('alert', [
                'mensagem' => 'Ocorreu um erro inesperado, por favor reporte ao email contato.fitdaily@gmail.com',
                'classe' => 'alert-danger show'
            ]);
        }
    }
}
