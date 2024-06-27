<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class FinanceiroController extends Controller
{
    public function index(){
        return view('financeiro.index');
    }
    public function extratos(){
        return view('financeiro.extratos.index');
    }
    public function planos(){
        return view('financeiro.planos.index');
    }
}
