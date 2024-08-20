<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'nome',];
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'usuario_id','id');
    }
    public function exercicios()
    {
        return $this->belongsToMany('App\Models\Exercicio', 'treino_exercicios', 'treino_id', 'exercicio_id');
    }
}
