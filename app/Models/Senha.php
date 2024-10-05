<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senha extends Model
{
    use HasFactory;
    protected $table = "senha_resets";
    protected $fillable = ['usuario_id', 'token'];
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario');
    }
    // public function scopeBuscarToken($query, $token){
    //     $query->where('senha_tok',$token);
    // }
}
