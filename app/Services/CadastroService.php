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
            DB::transaction(function() use (&$dados) {
                $usuario_id = $this->usuarioRepository::create($dados)->id;
                $dados['usuario_id']  = $usuario_id;
                $dados['email_token'] = $this->emailRepository::create($dados)->email_token;
                $this->senhaRepository::create($dados);
            });
            event(new VerificarEmailEvent($dados['nome_completo'], $dados['email'], $dados['email_token']));
            Log::info('Status: Usuario cadastrado com sucesso!');
            return true;
        }catch(QueryException $e){
            Log::error('Status: Erro ao cadastrar usuário: '.$e->getMessage());
            return false;
        }
    }
}