<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ImagemModel;

class UsuarioController extends Controller
{
    public function atualizar(Request $req){
        $sessao = Session::get('usuario');
        $imagem = $req->file('txtImagem');


        // dd($req->all());

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

            //Atualizar dados
            $usuario->email = $req->txtEmail;
            $usuario->celular = $req->txtCelular;
            $usuario->update();
            
            if(isset($req->txtImagem)){
                $diretorio = 'public/perfil_foto/' . $sessao['id'];
                $caminho = $imagem->store($diretorio);
                $imagem = ImagemModel::find($usuario->id)->first();
                if($imagem){
                    $imagem->caminho = $caminho;
                    $imagem->update();
                }
            }

            //Fim de atualizar dados

            //Atualizar sessão
            $perfil_foto = ImagemModel::where('usuario_id', $usuario->id)->first();
            $caminho = str_replace('public/', '', $perfil_foto->caminho); 

            Session::forget('usuario');

            $sessao_atualizada = [
                'id' => $usuario->id,
                'perfil_foto' => $caminho,
                'nome' => $usuario->nome,
                'sobrenome' => $usuario->sobrenome,
                'email' => $req->txtEmail,
                'celular' => $req->txtCelular,
            ];
            Session::put('usuario', $sessao_atualizada);
            //Fim de atualizar sessão

            return redirect()->route('perfil');
        }catch(QueryException $e){

        }
        
    }
}
