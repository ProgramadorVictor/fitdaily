<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extrato extends Model
{
    use HasFactory;

    protected $table = 'extratos';

    protected $fillable = ['pagamento_id','assinatura_id','usuario_id','valor','data_pagamento','data_vencimento'];

    public function assinatura()
    {
        return $this->belongsTo(Assinatura::class, 'assinatura_id');
    }
    public function pagamento()
    {
        return $this->belongsTo(Pagamento::class, 'pagamento_id');
    }
}
