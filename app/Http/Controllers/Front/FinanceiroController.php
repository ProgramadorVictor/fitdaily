<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Extrato;

class FinanceiroController extends Controller
{
    public function index(){
        return view('financeiro.index');
    }
    public function extratos(){
        $extratos = Extrato::where('usuario_id', session('usuario')['id'])->orderBy('created_at', 'desc')->get();
        return view('financeiro.extratos.index', ['extratos' => $extratos]);
    }
    public function planos(){
        return view('financeiro.planos.index');
    }
}
