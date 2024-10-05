<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $guarded = ['id'];
    protected $fillable = ['nome_completo', 'email', 'cpf', 'cpf', 'celular', 'senha', 'nascimento'];
    protected $casts = [];
    protected $hidden = ['senha', 'created_at', 'updated_at', 'cpf', 'email_token'];
    public function getAuthPassword(){
        return $this->senha;
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
    public function emails()
    {
        return $this->hasOne(Email::class);
    }
    public function senhas()
    {
        return $this->hasOne(Senha::class);
    }
    public function imagens()
    {
        return $this->hasOne(Imagem::class);
    }
    public function treino()
    {
        return $this->hasMany(Treino::class);
    }
}
