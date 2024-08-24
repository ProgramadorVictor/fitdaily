<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests\AdministradorRequest;
use App\Models\Tipo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdministradorController extends Controller
{
    public function login(){
        return view('admin.login.login');
    }
    public function autenticar(AdministradorRequest $req){
        $admin = Administrador::where('cpf', $req->input('cpf'))->first();
        if(Hash::check($req->input('senha'), $admin->senha)){
            Session::put('admin', $admin->getAttributes());
            return redirect()->route('admin.principal')
            ->with('alert', ['mensagem' => 'Autenticado com sucesso','classe' => 'alert-success show']);
        }
        return redirect()->route('admin.login')
        ->with('alert', ['mensagem' => 'Conta desativada ou administrador não encontrado','classe' => 'alert-danger show']);
    }
    public function principal(){
        $menus =
        [
            [
                'id' => 0,
                'nome' => 'EXERCICIOS',
                'route' => route('exercicio.index'),
            ],
            [
                'id' => 0,
                'nome' => 'GERENCIAR ALUNOS E TREINADORES',
                'route' => route('admin.gerenciar'),
            ],
        ];
        return view('admin.principal.index', ['menus' => $menus]);
    }
    public function gerenciar(){
        $usuarios = Usuario::orderBy('nome','asc')->get();
        $tipos = Tipo::all();
        return view('admin.alunos_e_treinadores.index')->with(['usuarios' => $usuarios, 'tipos' => $tipos]);
    }
    // public function alterarTipo(Request $request){
    //     $usuario = Usuario::find($request->input('id'));
    //     $usuario->tipo_id = $request->input('tipo');
    //     $usuario->save();
    //     response()->json();
    // }
    public function alterarTipo(Request $request){
        $usuario = Usuario::find($request->input('id'));
        $usuario->tipo_id = $request->input('tipo');
        $usuario->save();
        return redirect()->route('admin.gerenciar')
        ->with('alert', ['mensagem' => "O usuario foi atualizado com sucesso", 'classe' => 'alert-success show']);
    }
}
