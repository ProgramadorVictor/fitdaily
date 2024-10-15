<?php

namespace App\Repository;

use App\Models\Email;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class EmailRepository extends AbstractRepository
{
    protected static $model = Email::class;

    public static function create(array $dados): ?Model
    {
        return self::loadModel()::query()->create([
            'usuario_id' => $dados['usuario_id'],
            'email_token' => Str::random(60)
        ]);
    }
}