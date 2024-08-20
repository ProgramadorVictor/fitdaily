<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ExercicioTipo;
use App\Models\Treino;
use App\Models\TreinoExercicio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function perfil (){
        return view('usuario.perfil');
    }
    public function atualizar(Request $req){
        $usuario = Usuario::find(session('usuario')['id']);
        $antes = [
            'imagem' => session('usuario')['imagem'],
            'email' => session('usuario')['email'],
            'celular' => session('usuario')['celular']
        ];
        $depois = [
            'imagem' => ($req->imagem == null ? session('usuario')['imagem'] : $req->imagem),
            'email' => $req->email,
            'celular' => $req->celular
        ];
        if(!($antes == $depois)){
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
                $usuario->update();
                if($req->hasFile('imagem')){
                    $imagem = $req->imagem;
                    $extensao = $imagem->getClientOriginalExtension();
                    $nome_da_imagem = session('usuario')['id'] . '.' . $extensao;
                    $diretorio = 'imagem/usuarios'; $diretorio_publico = 'public/imagem/usuarios';
                    $storage = Storage::files($diretorio_publico);
                    foreach ($storage as $imagens) {
                        if (strpos($imagens, session('usuario')['id'] . '.') !== false) {
                            Storage::delete($imagens);
                        }
                    }
                    $imagem = $imagem->storeAs($diretorio_publico, $nome_da_imagem);
                    $usuario->imagens->imagem = $diretorio.'/'.$nome_da_imagem;
                    $usuario->imagens->update(); 
                }
                $sessao_atualizada = [
                    'id' => $usuario->id,
                    'tipo_id' => $usuario->tipo_id,
                    'nome' => $usuario->nome,
                    'sobrenome' => $usuario->sobrenome,
                    'email' => $req->email,
                    'email_verificado' => $usuario->email_verificado,
                    'celular' => $req->celular,
                    'nascimento' => $usuario->nascimento,
                    'imagem' => $diretorio.'/'.$nome_da_imagem,
                ];
                Session::put('usuario', $sessao_atualizada);
                return redirect()->route('usuario.perfil')
                ->with('alert', ['mensagem' => "Perfil atualizado com sucesso", 'classe' => "alert-success show"]);
            }catch(QueryException $e){
                return redirect()->route('usuario.perfil')->with('alert', ['mensagem' => "Ocorreu um erro inesperado.",'classe' => "alert-danger show"]);
            }
        }
        return redirect()->route('usuario.perfil')
        ->with('alert', ['mensagem' => 'Não fez nenhuma alterção', 'classe' => "alert-warning show"]);
    }
    public function treinos()
    {
        $treinos = Treino::with('exercicios')->where('usuario_id', session('usuario')['id'])->get();
        return view('treinos.index', ['treinos' => $treinos]);
    }
    public function exercicios(Treino $treino)
    {
        $exercicios = TreinoExercicio::where('treino_id', $treino->id)->get();
        return view('treinos.exercicios', ['exercicios' => $exercicios]);
    }
}
