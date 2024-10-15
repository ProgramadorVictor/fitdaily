<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastrarUsuarioRequest;
use App\Services\CadastroService;
use App\Http\Message;

class CadastroController extends Controller
{
    public function __construct(
        protected CadastroService $cadastroService
    ){}
    
    public function index(){
        return view('auth.cadastro.index');
    }
    
    public function cadastrar(CadastrarUsuarioRequest $request){
        if($this->cadastroService->cadastrarUsuario($request->validated())){
            return Message::success('Cadastro realizado com sucesso!', 'login');
        }
        return Message::exception('Ocorreu um erro inesperado, por favor reporte ao email contato.fitdaily@gmail.com', 'cadastro.index');
    }
}
