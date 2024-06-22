<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ImagemModel;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    public function atualizar(Request $req){

        $sessao = Session::get('usuario');
        $antes = [
            'perfil_foto' => $sessao['perfil_foto'],
            'email' => $sessao['email'],
            'celular' => $sessao['celular']
        ];

        $depois = [
            'perfil_foto' => ($req->txtImagem == null ? $sessao['perfil_foto'] : $req->txtImagem),
            'email' => $req->txtEmail,
            'celular' => $req->txtCelular
        ];

        if($depois != $antes){
            $imagem = $req->file('txtImagem');
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
                $usuario = Usuario::find($sessao['id']);

                $usuario->email = $req->txtEmail;
                $usuario->celular = $req->txtCelular;
                $usuario->update();
                
                if(isset($req->txtImagem)){
                    $diretorio = 'public/perfil_foto/' . $sessao['id'];
                    $caminho = $imagem->store($diretorio);
                    $imagem = ImagemModel::find($usuario->id);

                    if($imagem){
                        $imagem->caminho = $caminho;
                        $imagem->update();
                    }
                }

                $perfil_foto = ImagemModel::where('usuario_id', $usuario->id)->first();
                $caminho = str_replace('public/', '', $perfil_foto->caminho); 
    
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
    
                return redirect()->route('perfil', ['mensagem' => $mensagem, 'classe' => $classe]);
            }catch(QueryException $e){
                $mensagem = "Ocorreu um erro";
                $classe = "alert-danger show";

                return redirect()->route('perfil', ['mensagem' => $mensagem, 'classe' => $classe]);
            }
        }else{
            $mensagem = "Não ocorreu nenhuma alteração";
            $classe = "alert-warning show";

            return redirect()->route('perfil', ['mensagem' => $mensagem, 'classe' => $classe]);
        }
    }
}
