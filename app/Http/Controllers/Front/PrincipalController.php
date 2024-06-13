<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
// use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(){
        $sessao = Session::get('usuario');
        return view('principal.index', ['sessao' => $sessao]);
    }
    public function perfil(){
        $sessao = Session::get('usuario');
        return view('perfil.index', ['sessao' => $sessao]);
    }
}
