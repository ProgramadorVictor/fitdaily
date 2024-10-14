<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Events\VerificarEmailEvent;
use App\Repository\EmailRepository;
use App\Repository\SenhaRepository;
use App\Repository\UsuarioRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CadastroService{
    public function __construct(
        protected EmailRepository $emailRepository,
        protected UsuarioRepository $usuarioRepository,
        protected SenhaRepository $senhaRepository
    ){}
    public function prepararDados($dados){
        $dados['nascimento'] = format_data($dados['nascimento']);
        $dados['senha'] = Hash::make($dados['senha']);
        try{
            DB::transaction(function() use ($dados, &$email) {
                $usuario = $this->usuarioRepository->cadastrarDados($dados);
                $email = $this->emailRepository->findOrCreate($usuario->only(['id']));
                $this->senhaRepository->findOrCreate($usuario->only(['id']));
            });
            $event_dados = [
                'nome_completo' => $dados['nome_completo'],
                'email' => $dados['email'],
                'token' => $email->email_token,
            ];
            event(new VerificarEmailEvent($event_dados));
            Log::info('Status: Usuario cadastrado com sucesso!');
            return true;
        }catch(QueryException $e){
            Log::error('Status: Erro ao cadastrar usuário: '.$e->getMessage());
            return false;
        }
    }
}