<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;
    protected $table = 'mensagens';
    protected $fillable = ['usuario_id', 'conteudo'];
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
