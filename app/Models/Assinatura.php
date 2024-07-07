<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    use HasFactory;
    protected $table = 'assinaturas';
    protected $fillable = ['assinatura', 'valor','titulo','descricao','duracao','desconto'];
}
