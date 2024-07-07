<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $fillable = ['nome','sobrenome','tipo_de_conta_id','email','cpf','celular','senha','nascimento','data_inicio_academia','data_fim_academia'];
}
