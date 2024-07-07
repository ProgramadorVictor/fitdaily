<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;
    protected $table = 'imagem_de_usuarios';
    protected $primaryKey = 'usuario_id';
    protected $fillable = ['usuario_id','caminho'];

}
