<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercicio extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nome', 'tipo_id', 'imagem'];
    public function tipo()
    {
        return $this->belongsTo('App\Models\ExercicioTipo','tipo_id','id');
    }
    public function treinos()
    {
        return $this->belongsToMany('App\Models\Treino', 'treino_exercicios', 'exercicio_id', 'treino_id');
    }
}
