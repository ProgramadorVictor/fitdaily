<?php

namespace App\Http\Controllers\Front;

use App\Models\Exercicio;
use App\Models\ExercicioTipo;
use App\Models\TreinoExercicio;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Treino;
class AlunosTreinosController extends Controller
{
    public function index(){
        $alunos = Usuario::orderBy('nome','asc')->get();
        return view('alunos_treinos.index', ['alunos' => $alunos]);
    }
    public function treino(Usuario $aluno){
        $treinos = $aluno->treino;
        return view('alunos_treinos.aluno', ['aluno' => $aluno, 'treinos' => $treinos]);
    }
    public function adicionarTreino(Usuario $aluno){
        try{
            if ($aluno->treino->count() <= 4)
            {
                switch ($aluno->treino->count()) {
                    case 0:
                        $aluno->treino()->create([
                            'usuario_id' => $aluno->id,
                            'nome' => 'A',
                        ]);
                        break;
                    case 1:
                        $aluno->treino()->create([
                            'usuario_id' => $aluno->id,
                            'nome' => 'B',
                        ]);
                        break;
                    case 2:
                        $aluno->treino()->create([
                            'usuario_id' => $aluno->id,
                            'nome' => 'C',
                        ]);
                        break;
                    case 3:
                        $aluno->treino()->create([
                            'usuario_id' => $aluno->id,
                            'nome' => 'D',
                        ]);
                        break;
                    default:
                        return redirect()->route('alunos-treinos.aluno', ['aluno' => $aluno])->with('alert', ['mensagem' => 'Limite de treinos alcançado','classe' => 'alert-danger show']);
                }
            }
            return redirect()->route('alunos-treinos.aluno', ['aluno' => $aluno])
            ->with('alert', ['mensagem'=>'Treino adicionado com sucesso','classe' => 'alert-success show']);
        }catch(Exception $e){
            return redirect()->route('alunos-treinos.aluno', ['aluno' => $aluno])
            ->with('alert', ['mensagem'=>'Ocorreu um erro inesperado, por favor reporte ao email contato.fitdaily@gmail.com','classe' => 'alert-danger show']);
        }
    }
    public function apagarTreino(Treino $treino){
        $treino->delete();
        return redirect()->route('alunos-treinos.aluno', ['aluno' => $treino->usuario])
        ->with('alert', ['mensagem'=>'Treino removido com sucesso','classe' => 'alert-success show']);
    }
    public function editarExercicios(Treino $treino){
        $aluno = $treino->usuario;
        $exercicios = Exercicio::all();
        $tipos = ExercicioTipo::all();
        $exercicios_do_aluno = TreinoExercicio::where('treino_id', $treino->id)->get();
        return view('alunos_treinos.editar', ['exercicios_do_aluno' =>  $exercicios_do_aluno ,'aluno' => $aluno, 'treino' => $treino, 'tipos' => $tipos, 'exercicios' => $exercicios]);
    }
    public function buscarExerciciosAjax($id){
        $exercicios = Exercicio::where('tipo_id', $id)->get();
        return response()->json($exercicios);
    }
    public function buscarImagemExerciciosAjax($id){
        $imagem = Exercicio::select('imagem')->where('id', $id)->first();
        return response()->json($imagem);
    }
    public function salvarExercicio(Request $request){
        $regras = [
            'treino' => 'required',
            'exercicio' => 'required',
            'repeticoes' => 'required',
            'serie' => 'required',
            'carga' => 'required',
        ];
        $feedback = [
            'required' => 'O campo :attribute é requerido',
        ];
        $request->validate($regras, $feedback);
        $treino_exercicio = new TreinoExercicio();
        $treino_exercicio->exercicio_id = $request->input('exercicio');
        $treino_exercicio->treino_id = $request->input('treino');
        $treino_exercicio->repeticoes = $request->input('repeticoes');
        $treino_exercicio->serie = $request->input('serie');
        $treino_exercicio->carga = $request->input('carga');
        $treino_exercicio->save();
        return redirect()->route('alunos-treinos.editar-exercicio', ['treino' => $treino_exercicio->treino_id])
        ->with('alert', ['mensagem'=>'Exercicio adicionado com sucesso','classe' => 'alert-success show']);
    }
    public function apagarExercicio(TreinoExercicio $treinoexercicio){
        $treinoexercicio->delete();
        return redirect()->route('alunos-treinos.editar-exercicio', ['treino' => $treinoexercicio->treino_id])
        ->with('alert', ['mensagem'=>'Exercicio removido com sucesso','classe' => 'alert-success show']);
    }
}

