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
            'perfil_foto' => ($req->imagem == null ? session('usuario')['perfil_foto'] : $req->imagem),
            'email' => $req->email,
            'celular' => $req->celular
        ];

        if($depois != $antes){
            $regras = [
                'celular' => 'required|celular_com_ddd',
                'email' => 'required|email',
                'imagem' => 'image'
            ];
            $feedback = [
                'celular.required' => 'O campo celular é requerido.',
                'celular.celular_com_ddd' => 'O campo celular digitado é inválido.',
                'email.required' => 'O campo email é requerido.',
                'email.email' => 'O campo email é inválido.',
                'imagem.image' => 'O arquivo enviado não é uma imagem.'
            ];
            $req->validate($regras, $feedback);
            try{
                $usuario = Usuario::find(session('usuario')['id']);

                $usuario->email = $req->email;
                $usuario->celular = $req->celular;
                $usuario->update();

                $caminho = ImagemController::atualizarImagem($req->file('imagem'));

                Session::forget('usuario');

                $sessao_atualizada = [
                    'id' => $usuario->id,
                    'tipo_de_conta' => $usuario->tipo_de_conta_id,
                    'perfil_foto' => $caminho,
                    'nome' => $usuario->nome,
                    'sobrenome' => $usuario->sobrenome,
                    'email' => $req->email,
                    'celular' => $req->celular,
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
