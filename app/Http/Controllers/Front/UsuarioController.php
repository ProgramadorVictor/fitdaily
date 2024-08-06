<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Imagem;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function atualizar(Request $req){
        $usuario = Usuario::find(session('usuario')['id']);
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
        $alteracao = $antes != $depois;
        if($alteracao){
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
                $usuario->fill($req->all());
                // $usuario->email = $req->email;
                // $usuario->celular = $req->celular;
                $usuario->update();
                // $caminho = "";
                if($req->hasFile('imagem')){
                    $imagem = $req->imagem;
                    $extensao = $imagem->getClientOriginalExtension();
                    $nome_da_imagem = session('usuario')['id'] . '.' . $extensao;
                    // if(isset($imagem)){
                    $diretorio = 'public/perfil_foto';
                    // $imagens_storage = Storage::files($diretorio);
                    // dd($imagens_storage);
                    $storage = Storage::files($diretorio);
                    foreach ($storage as $imagens) {
                        // dd($imagens);
                        if (strpos($imagens, session('usuario')['id'] . '.') !== false) {
                            Storage::delete($imagens);
                        }
                    }
                    $caminho = $imagem->storeAs($diretorio, $nome_da_imagem);
                    $imagem = Imagem::find(session('usuario')['id']);
                    // dd($imagem);
                    // isset($imagem) ? $imagem->update($caminho) : '';
                    // $imagem ? ($imagem->caminho = $caminho, $imagem->update()) : null;
                    $imagem ? ($imagem->update(['caminho' => $caminho])) : null;
                    // if($imagem){
                    //     $imagem->caminho = $caminho;
                    //     $imagem->update();
                    // }
                    // }
                    $caminho = Imagem::where('usuario_id', session('usuario')['id'])->first();
                    $perfil_foto = str_replace('public/', '', $caminho->caminho); 
                }
                // $caminho = ImagemController::atualizarImagem($req->file('imagem'));
                $sessao_atualizada = [
                    'id' => $usuario->id,
                    'tipo_de_conta' => $usuario->tipo_de_conta_id,
                    'perfil_foto' => $perfil_foto,
                    'nome' => $usuario->nome,
                    'sobrenome' => $usuario->sobrenome,
                    'email' => $req->email,
                    'celular' => $req->celular,
                ];
                Session::put('usuario', $sessao_atualizada);
                $dados = [
                    'mensagem' => "Perfil atualizado com sucesso",
                    'classe' => "alert-success show"
                ];
                return redirect()->route('perfil')->with('alert', ['dados' => $dados]);
            }catch(QueryException $e){
                $dados = [
                    'mensagem' => "Ocorreu um erro",
                    'classe' => "alert-danger show"
                ];
                return redirect()->route('perfil')->with('alert', ['dados' => $dados]);
            }
        }else{
            $dados = [
                'mensagem' => "Não ocorreu nenhuma alteração",
                'classe' => "alert-warning show"
            ];
            return redirect()->route('perfil')->with('alert', ['dados' => $dados]);
        }
    }
}
