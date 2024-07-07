<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Treino;
use App\Models\Exercicio;

class PrincipalController extends Controller
{
    public function index($mensagem = null, $classe = null){
        return view('principal.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
    public function perfil($mensagem = null, $classe = null){
        return view('perfil.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
    public function financeiro($mensagem = null, $classe = null){
        return view('financeiro.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
    public function treinos($mensagem = null, $classe = null){
        $treinos = Treino::where('usuario_id', session('usuario')['id'])->get();

        foreach ($treinos as $treino) {
            $exercicios = json_decode($treino->treino, true);
            $array = array_column($exercicios, 'exercicio_id');
            $treino->exercicios = Exercicio::whereIn('id', $array)->get();
        }
        return view('treinos.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe])->with(['treinos' => $treinos]);
    }
    public function agenda($mensagem = null, $classe = null){
        return view('agenda.index')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
    }
}
