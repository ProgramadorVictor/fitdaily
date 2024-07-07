<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;
    protected $table = 'pagamentos';
    protected $fillable = ['usuario_id','assinatura_id','identificador','status_de_pagamento','tipo_de_pagamento','transacao_de_pedido'];

    public function assinatura()
    {
        return $this->belongsTo(Assinatura::class, 'assinatura_id');
    }
}
