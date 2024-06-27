<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function atualizar(Request $req){
        
        $antes = [
            'perfil_foto' => session('usuario')['perfil_foto'],
            'email' => session('usuario')['email'],
            'celular' => session('usuario')['celular']
        ];

        $depois = [
            'perfil_foto' => ($req->txtImagem == null ? session('usuario')['perfil_foto'] : $req->txtImagem),
            'email' => $req->txtEmail,
            'celular' => $req->txtCelular
        ];

        if($depois != $antes){
            $regras = [
                'txtCelular' => 'required|celular_com_ddd',
                'txtEmail' => 'required|email',
                'txtImagem' => 'image'
            ];
            $feedback = [
                'txtCelular.required' => 'O campo celular é requerido.',
                'txtCelular.celular_com_ddd' => 'O campo celular digitado é inválido.',
                'txtEmail.required' => 'O campo email é requerido.',
                'txtEmail.email' => 'O campo email é inválido.',
                'txtImagem.image' => 'O arquivo enviado não é uma imagem.'
            ];
            $req->validate($regras, $feedback);
            try{
                $usuario = Usuario::find(session('usuario')['id']);

                $usuario->email = $req->txtEmail;
                $usuario->celular = $req->txtCelular;
                $usuario->update();

                $caminho = ImagemController::atualizarImagem($req->file('txtImagem'));

                Session::forget('usuario');

                $sessao_atualizada = [
                    'id' => $usuario->id,
                    'tipo' => $usuario->tipo,
                    'perfil_foto' => $caminho,
                    'nome' => $usuario->nome,
                    'sobrenome' => $usuario->sobrenome,
                    'email' => $req->txtEmail,
                    'celular' => $req->txtCelular,
                ];

                Session::put('usuario', $sessao_atualizada);

                $mensagem = "Perfil atualizado com sucesso";
                $classe = "alert-success show";
    
                return redirect()->route('perfil')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
            }catch(QueryException $e){
                $mensagem = "Ocorreu um erro";
                $classe = "alert-danger show";

                return redirect()->route('perfil')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
            }
        }else{
            $mensagem = "Não ocorreu nenhuma alteração";
            $classe = "alert-warning show";

            return redirect()->route('perfil')->with('alert', ['mensagem' => $mensagem, 'classe' => $classe]);
        }
    }
}
