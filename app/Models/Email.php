<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'email_token'];
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
    public function scopeBuscarToken($query, $token){
        $query->where('email_token',$token);
    }
}
