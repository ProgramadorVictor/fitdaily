<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PrincipalController extends Controller
{
    public function index(){
        $sessao = Session::get('usuario');
        return view('principal.index', ['sessao' => $sessao]);
    }
    public function perfil($mensagem = null, $classe = null){
        $sessao = Session::get('usuario');
        return view('perfil.index', ['mensagem' => $mensagem,'classe' => $classe,'sessao' => $sessao]);
    }
}
