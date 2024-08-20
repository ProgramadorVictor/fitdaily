<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrato extends Model
{
    use HasFactory;
    protected $fillable = [
        'pagamento_id',
        'usuario_id',
        'data_pagamento',
        'data_vencimento',
    ];
    protected $dates = [
        'data_pagamento',
        'data_vencimento',
    ];
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario');
    }
    public function pagamento()
    {
        return $this->belongsTo('App\Models\Pagamento','pagamento_id','id');
    }
    //Isso abaixo é confuso, ainda estudar
    public function pagamento_assinatura()
    {//Lembra de estudar isso
        return $this->hasManyThrough('App\Models\Assinatura','App\Models\Pagamento','id','id','pagamento_id','assinatura_id');
    }
}