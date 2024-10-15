<?php

namespace App\Repository;

use App\Repository\Contract\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    protected static $model;
    
    public static function loadModel(): Model
    {
        return app(static::$model);
    }

    public static function create(array $dados): ?Model
    {
        return self::loadModel()::query()->create($dados);
    }

    public static function findBy($coluna, $operador, $valor)
    {
        return self::loadModel()::query()->where($coluna, $operador, $valor)->first();
    }
}
