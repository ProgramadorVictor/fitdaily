<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'sobrenome', 'email', 'cpf', 'celular', 'senha', 'nascimento', 'email_token', 'tipo_id', 'email_verificado'];
    //tipo_id e email_verificado deve ser tirado posteriormente ao sair da fase de testes
    protected $hidden = ['senha', 'created_at', 'updated_at', 'cpf', 'email_token',];
    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo');
    }
    public function emails()
    {
        return $this->hasOne('App\Models\Email');
    }
    public function senhas()
    {
        return $this->hasOne('App\Models\Senha');
    }
    public function imagens()
    {
        return $this->hasOne('App\Models\Imagem');
    }
    public function treino()
    {
        return $this->hasMany('App\Models\Treino');
    }
}
