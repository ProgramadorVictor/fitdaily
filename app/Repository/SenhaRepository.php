<?php

namespace App\Repository;

use App\Models\Senha;

class SenhaRepository{
    public function __construct(
        protected Senha $senha
    ){}
    public function cadastrarDados($dados)
    {
        return $this->senha::create([
            'usuario_id' => $dados['id']
        ]);
    }
}