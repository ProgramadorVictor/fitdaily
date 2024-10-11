<?php

namespace App\Repository;

use App\Models\Email;
use Illuminate\Support\Str;

class EmailRepository{
    public function __construct(
        protected Email $email
    ){}
    public function cadastrarDados($dados)
    {
        return $this->email::create([
            'usuario_id' => $dados['id'],
            'email_token' => Str::random(60)
        ]);
    }
}