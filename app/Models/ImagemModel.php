<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemModel extends Model
{
    use HasFactory;
    protected $table = 'imagem_usuarios';
    protected $primaryKey = 'usuario_id';
    protected $fillable = ['usuario_id','caminho'];

}
