<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table = 'tipo_de_usuarios';
    protected $fillable = ['tipo_de_conta'];

    public function usuario(){
        return $this->hasOne('App\Models\Usuario','tipo_de_conta_id','id');
    }

}
