<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;
    protected $table = 'usuario_imagens';
    protected $guarded = ['id'];
    protected $fillable = ['usuario_id', 'imagem'];
    protected $casts = [];
    protected $hidden = ['created_at', 'updated_at'];
}
