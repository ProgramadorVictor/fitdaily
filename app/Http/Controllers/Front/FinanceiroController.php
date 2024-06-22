<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class FinanceiroController extends Controller
{
    public function index(){
        $sessao = Session::get('usuario');
        return view('financeiro.index', ['sessao' => $sessao]);
    }
    public function extratos(){
        $sessao = Session::get('usuario');
        return view('financeiro.extratos.index', ['sessao' => $sessao]);
    }
    public function planos(){
        $sessao = Session::get('usuario');
        return view('financeiro.planos.index', ['sessao' => $sessao]);
    }
}
