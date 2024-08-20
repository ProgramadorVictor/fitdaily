<?php

namespace App\Http\Controllers\Back;

use App\Models\Exercicio;
use App\Models\ExercicioTipo;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ExercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercicios = Exercicio::all();
        return view('admin.exercicios.index', ['exercicios' => $exercicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = ExercicioTipo::all();
        return view('admin.exercicios.adicionar', ['tipos' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = 
        [
            'nome' => 'required',
            'tipo' => 'required',
            'imagem' => 'required|image'
        ];
        $feedback = 
        [
            'required' => "O campo :attribute é requerido",
            'imagem.image' => 'O arquivo enviado não é uma imagem',
        ];
        $request->validate($regras, $feedback);
        try{
            $tipo = ExercicioTipo::where('id', $request->tipo)->first();
            $imagem = $request->file('imagem');
            $extensao = $imagem->getClientOriginalExtension();
            $nome_da_imagem = $request->input('nome').'.'.$extensao;
            $diretorio = 'imagem/exercicios/'.$tipo->nome; $diretorio_publico = 'public/imagem/exercicios/'.$tipo->nome;
            $imagem = $imagem->storeAs($diretorio_publico, $nome_da_imagem);
            Exercicio::create([
                'nome' => $request->input('nome'),
                'tipo_id' => $request->input('tipo'),
                'imagem' => $diretorio.'/'.$nome_da_imagem,
            ]);
            return redirect()->route('exercicio.index')
            ->with('alert', ['mensagem' => "Você cadastrou um exercicio com sucesso", 'classe' => 'alert-success show']);
        }catch(Exception $e){
            return redirect()->route('exercicio.index')
            ->with('alert', ['mensagem' => "Ocorreu um erro inesperado", 'classe' => 'alert-danger show']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercicio  $exercicio
     * @return \Illuminate\Http\Response
     */
    public function show(Exercicio $exercicio)
    {
        //Talvez eu posso mostra quais alunos estão associados a esse exercicio.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercicio  $exercicio
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Exercicio $exercicio)
    {
        $tipos = ExercicioTipo::all();
        return view('admin.exercicios.editar', ['exercicio' => $exercicio, 'tipos' => $tipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercicio  $exercicio
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercicio $exercicio)
    {
        try{
            $antes = $exercicio->only('nome','tipo');
            $depois = $request->only('nome','tipo');
            if(!($antes == $depois) || $request->hasFile('imagem')){
                $tipo = ExercicioTipo::where('id', $request->tipo)->first();
                if(!$request->hasFile('imagem')){
                    $regras = 
                    [
                        'nome' => 'required',
                        'tipo' => 'required',
                    ];
                    $feedback = 
                    [
                        'required' => "O campo :attribute é requerido",
                    ];
                    $request->validate($regras, $feedback);
                    $exercicio->nome = $request->input('nome');
                    $exercicio->tipo_id = $request->input('tipo');
                    $exercicio->update();
                    return redirect()->route('exercicio.edit', ['exercicio' => $exercicio->id])
                    ->with('alert', ['mensagem' => "O exercicio foi atualizado com sucesso", 'classe' => 'alert-success show']);
                }
                $regras = 
                [
                    'nome' => 'required',
                    'tipo' => 'required',
                    'imagem' => 'required|image'
                ];
                $feedback = 
                [
                    'required' => "O campo :attribute é requerido",
                    'imagem.image' => 'O arquivo enviado não é uma imagem',
                ];
                $request->validate($regras, $feedback);
                $imagem = $request->file('imagem');
                $extensao = $imagem->getClientOriginalExtension();
                $nome_da_imagem = $request->input('nome').'.'.$extensao;
                $diretorio = 'imagem/exercicios/'.$tipo->nome; $diretorio_publico = 'public/imagem/exercicios/'.$tipo->nome;
                $imagem = $imagem->storeAs($diretorio_publico, $nome_da_imagem);
                $exercicio->nome = $request->input('nome');
                $exercicio->tipo_id = $request->input('tipo');
                $exercicio->imagem = $diretorio.'/'.$nome_da_imagem;
                $exercicio->update();
                return redirect()->route('exercicio.index')
                ->with('alert', ['mensagem' => "O exercicio foi atualizado com sucesso", 'classe' => 'alert-success show']);
            }
            return redirect()->route('exercicio.index')
            ->with('alert', ['mensagem' => "Nenhuma alteração foi feita", 'classe' => 'alert-warning show']);
        }catch(Exception $e){
            return redirect()->route('exercicio.edit', ['exercicio' => $exercicio->id])
                ->with('alert', ['mensagem' => "Ocorreu um erro inesperado", 'classe' => 'alert-danger show']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercicio  $exercicio
    //  * @return \Illuminate\Http\Response
     */
    public function destroy(Exercicio $exercicio)
    {
        $exercicio->delete();
        return redirect()->route('exercicio.index')
        ->with('alert', ['mensagem' => "Você apagou um exercicio com sucesso", 'classe' => 'alert-success show']);
    }
}
