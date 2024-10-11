<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastrarUsuarioRequest;
use App\Services\CadastroService;

class CadastroController extends Controller
{
    public function __construct(
        protected CadastroService $cadastroService
    ){}
    public function index(){
        return view('auth.cadastro.index');
    }
    public function cadastrar(CadastrarUsuarioRequest $request){
        if($this->cadastroService->prepararDados($request->validated())){
            return redirect()->route('login')->with('alert', [
                'mensagem' => 'Cadastro realizado com sucesso!',
                'classe' => 'alert-success show'
            ]);  
        }
        return redirect()->route('cadastro.index')->with('alert', [
            'mensagem' => 'Ocorreu um erro inesperado, por favor reporte ao email contato.fitdaily@gmail.com',
            'classe' => 'alert-danger show'
        ]);
    }
}
