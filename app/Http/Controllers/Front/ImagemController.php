<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Imagem;
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

        if($imagem != null){
            $extensao = $imagem->getClientOriginalExtension();
            $imagem_nome = session('usuario')['id'] . '.' . $extensao;

            if(isset($imagem)){
                $diretorio = 'public/perfil_foto';

                $imagens_storage = Storage::files($diretorio);

                foreach ($imagens_storage as $imagens) {
                    if (strpos($imagens, session('usuario')['id'] . '.') !== false) {
                        Storage::delete($imagens);
                    }
                }

                $caminho = $imagem->storeAs($diretorio, $imagem_nome);
                $imagem = Imagem::find(session('usuario')['id']);
                
                if($imagem){
                    $imagem->caminho = $caminho;
                    $imagem->update();
                }

            }

            $perfil_foto = Imagem::where('usuario_id', session('usuario')['id'])->first();

            return $caminho = str_replace('public/', '', $perfil_foto->caminho); 
        }else{
            $perfil_foto = Imagem::where('usuario_id', session('usuario')['id'])->first();
            return $caminho = str_replace('public/', '', $perfil_foto->caminho); 
        }
    }
}
