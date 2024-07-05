<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class PrincipalController extends Controller
{
    public function index($mensagem = null, $classe = null){
        return view('principal.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
    public function perfil($mensagem = null, $classe = null){
        return view('perfil.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
    public function treinos($mensagem = null, $classe = null){
        return view('treinos.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
}
