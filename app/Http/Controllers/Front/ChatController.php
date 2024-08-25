<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Events\MensagemEvent;
use Illuminate\Http\Request;
use App\Models\Mensagem;
use App\Models\Usuario;
use App\Models\Imagem;
use App\Models\Aviso;
class ChatController extends Controller
{
    public function chat(){
        $mensagens = Mensagem::orderBy('created_at','desc')->take(20)->get();
        $mensagens = $mensagens->sortBy('created_at'); //sortByDesc
        return view('chat.index', ['mensagens' => $mensagens]);
    }
    public function enviarMensagem(Request $request)
    {
        $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);
        // $mensagem = htmlspecialchars($request->input('mensagem'), ENT_QUOTES, 'UTF-8');
        //Duas formas de resolver o mesmo problema acima não sei a diferença ainda entre as duas, mas uma é usado no Laravel a de baixo e uma é usada no PHP a de cima.
        $regras = [
            'mensagem' => 'required',
        ];
        $feedback = [
            'mensagem.required' => "Mensagem é requerida",
        ];
        $request->validate($regras, $feedback);
        $id = session('usuario')['id'];
        $usuario = Usuario::find($id)->only(['id', 'celular', 'email', 'nome', 'sobrenome','tipo_id', 'nascimento']);
        $imagem = Imagem::where('usuario_id', $id)->first()->only(['id','usuario_id','imagem']);
        Mensagem::create([
            'usuario_id' => $id,
            'conteudo' => $mensagem,
        ]);
        $dados = [
            'imagem' => $imagem,
            'mensagem' => $mensagem,
            'usuario' => $usuario,
        ];
        event(new MensagemEvent($dados));
        return response()->json(['status' => 'Mensagem enviada!']);
    }
}
