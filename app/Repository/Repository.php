<?php

namespace App\Repository;

interface Repository{
    public function findOrCreate($dados);
}