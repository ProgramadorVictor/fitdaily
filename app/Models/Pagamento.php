<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'assinatura_id', 'collection_id', 'collection_status', 'payment_id', 'status', 'payment_type', 'preference_id'];
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario');
    }
    public function assinatura()
    {
        return $this->belongsTo('App\Models\Assinatura');
    }
}
