<?php

namespace App\Repository;

use App\Models\Senha;
use App\Repository\Repository;

class SenhaRepository implements Repository{
    public function __construct(
        protected Senha $senha
    ){}
    public function findOrCreate($dados){
        return $this->senha::firstOrCreate([
            'usuario_id' => $dados['id']
        ]);
    }
}