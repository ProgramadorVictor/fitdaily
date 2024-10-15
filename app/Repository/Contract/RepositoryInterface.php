<?php

namespace App\Repository\Contract;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function create(array $dados): Model|null;
}