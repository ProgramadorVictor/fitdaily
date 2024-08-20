<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\AdministradorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdministradorController extends Controller
{
    public function login(){
        session()->forget('usuario'); session()->forget('admin');
        return view('admin.login.login');
    }
    public function autenticar(AdministradorRequest $req){
        $admin = Administrador::where('cpf', $req->input('cpf'))->first();
        if(!$admin){
            return redirect()->route('admin.login')
            ->with('alert', ['mensagem' => 'Conta desativada ou administrador não encontrado','classe' => 'alert-danger show']);
        }
        if(Hash::check($req->input('senha'), $admin->senha)){
            Session::put('admin', $admin->getAttributes());
        }
        return redirect()->route('admin.principal')
        ->with('alert', ['mensagem' => 'Autenticado com sucesso','classe' => 'alert-success show']);
    }
    public function principal(){
        $menus =
        [
            [
                'id' => 0,
                'nome' => 'EXERCICIOS',
                'route' => route('exercicio.index'),
            ],
        ];
        return view('admin.principal.index', ['menus' => $menus]);
    }
}
