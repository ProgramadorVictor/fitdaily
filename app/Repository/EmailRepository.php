<?php

namespace App\Repository;

use App\Models\Email;
use Illuminate\Support\Str;
use App\Repository\Repository;

class EmailRepository implements Repository{
    public function __construct(
        protected Email $email
    ){}
    public function findOrCreate($dados){
        return $this->email::firstOrCreate([
            'usuario_id' => $dados['id'],
            'email_token' => Str::random(60)
        ]);
    }
}