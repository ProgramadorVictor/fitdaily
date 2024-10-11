<?php

namespace App\Repository;

use App\Models\Usuario;

class UsuarioRepository{
    public function __construct(
        protected Usuario $usuario
    ){}
    public function cadastrarDados($dados)
    {
        return $this->usuario::create($dados);
    }
}