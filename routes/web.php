<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\ChatController;

Route::get('/', function(){
    return redirect()->route('login.index');
});

Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro.index');
Route::post('/cadastro-realizado', [CadastroController::class, 'cadastrar'])->name('cadastro.cadastrar');

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login-realizado', 'logar')->name('login.logar');
    Route::get('/logout', 'logout')->name('login.logout');
    Route::post('/recuperar', 'recuperar')->name('login.recuperar');
    Route::get('/verificar', 'verificar')->name('login.verificar');
    Route::view('/recuperar-senha', 'auth.login.recuperar-senha')->name('login.recuperar-senha');
    Route::patch('/alterar-senha', 'alterarSenha')->name('login.alterar-senha');
});
/* As rotas acimas, especificar melhor os métodos. */

/* As rotas abaixos e controllers devem ser mexidas. */
Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
    Route::get('/chat',[ChatController::class, 'chat'])->name('tela-principal');
    Route::post('/enviar-mensagem','App\Http\Controllers\Front\ChatController@enviarMensagem');





    Route::get('/usuario-perfil','App\Http\Controllers\Front\UsuarioController@perfil')->name('usuario.perfil');
    Route::patch('/usuario-perfil-atualizar','App\Http\Controllers\Front\UsuarioController@atualizar')->name('usuario.atualizar');
    Route::get('/usuario-treinos','App\Http\Controllers\Front\UsuarioController@treinos')->name('usuario.treinos');
    Route::get('/usuario-exercicios/{treino}','App\Http\Controllers\Front\UsuarioController@exercicios')->name('usuario.exercicios');

    Route::get('/planos','App\Http\Controllers\Front\FinanceiroPagamentoController@planos')->name('financeiro-pagamento.planos');
    Route::post('/pagamento','App\Http\Controllers\Front\FinanceiroPagamentoController@realizarPagamento')->name('financeiro-pagamento.realizar-pagamento');
    Route::get('/pagamento-sucesso', 'App\Http\Controllers\Front\FinanceiroPagamentoController@success')->name('financeiro-pagamento.pagamento-sucesso');
    Route::get('/pagamento-falha', 'App\Http\Controllers\Front\FinanceiroPagamentoController@failure')->name('financeiro-pagamento.pagamento-falha');
    Route::get('/pagamento-pendente', 'App\Http\Controllers\Front\FinanceiroPagamentoController@pending')->name('financeiro-pagamento.pagamento-pendente');
    Route::get('/extratos','App\Http\Controllers\Front\FinanceiroPagamentoController@extratos')->name('financeiro-pagamento.extratos');
    
    
    Route::get('/alunos-treinos/index','App\Http\Controllers\Front\AlunosTreinosController@index')->name('alunos-treinos.index');
    Route::get('/alunos-treinos/aluno/{aluno}','App\Http\Controllers\Front\AlunosTreinosController@treino')->name('alunos-treinos.aluno');
    Route::post('/alunos-treinos/aluno/adicionar-treino/{aluno}','App\Http\Controllers\Front\AlunosTreinosController@adicionarTreino')->name('alunos-treinos.adicionar-treino');
    Route::delete('/alunos-treinos/aluno/apagar-treino/{treino}','App\Http\Controllers\Front\AlunosTreinosController@apagarTreino')->name('alunos-treinos.apagar-treino');
    Route::get('/alunos-treinos/aluno/treino/{treino}','App\Http\Controllers\Front\AlunosTreinosController@editarExercicios')->name('alunos-treinos.editar-exercicio');
    Route::get('/alunos-treinos/aluno/treino/exercicios/{id}','App\Http\Controllers\Front\AlunosTreinosController@buscarExerciciosAjax')->name('alunos-treinos.buscar-exercicio');
    Route::get('/alunos-treinos/aluno/treino/exercicios/imagem/{id}','App\Http\Controllers\Front\AlunosTreinosController@buscarImagemExerciciosAjax')->name('alunos-treinos.buscar-imagem-exercicio');
    Route::post('/alunos-treinos/aluno/treino/salvar-exercicio','App\Http\Controllers\Front\AlunosTreinosController@salvarExercicio')->name('alunos-treinos.salvar-exercicio');
    Route::delete('/alunos-treinos/aluno/apagar-exercicio/{treinoexercicio}','App\Http\Controllers\Front\AlunosTreinosController@apagarExercicio')->name('alunos-treinos.apagar-exercicio');




});
