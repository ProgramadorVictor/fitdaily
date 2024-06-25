<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Imagem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller
{
    public static function primeiroLogin($usuario){
        if(!Imagem::where('usuario_id', $usuario->id)->first()){
            $imagem = new Imagem();
            $imagem->usuario_id = $usuario->id;
            $imagem->save();
        }
        $perfil_foto = Imagem::where('usuario_id', $usuario->id)->first();
        $caminho = str_replace('public/', '', $perfil_foto->caminho); 

        return $caminho;
    }
    public static function atualizarImagem($imagem){
        $sessao = Session::get('usuario');
        $extensao = $imagem->getClientOriginalExtension();
        $imagem_nome = $sessao['id'] . '.' . $extensao;

        if(isset($imagem)){
            $diretorio = 'public/perfil_foto';

            $imagens_storage = Storage::files($diretorio);

            foreach ($imagens_storage as $imagens) {
                if (strpos($imagens, $sessao['id'] . '.') !== false) {
                    Storage::delete($imagens);
                }
            }

            $caminho = $imagem->storeAs($diretorio, $imagem_nome);
            $imagem = Imagem::find($sessao['id']);
            
            if($imagem){
                $imagem->caminho = $caminho;
                $imagem->update();
            }

        }

        $perfil_foto = Imagem::where('usuario_id', $sessao['id'])->first();

        return $caminho = str_replace('public/', '', $perfil_foto->caminho); 
    }
}
