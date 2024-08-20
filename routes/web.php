<?php

use Illuminate\Support\Facades\Route;
use App\Mail\VerificarEmail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Front
Route::get('/cadastro', 'App\Http\Controllers\Auth\CadastroController@index')->name('cadastro.index');
Route::post('/cadastro-realizado', 'App\Http\Controllers\Auth\CadastroController@cadastrar')->name('cadastro.cadastrar');
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login.index');
Route::post('/login-realizado', 'App\Http\Controllers\Auth\LoginController@logar')->name('login.logar');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('login.logout');
Route::get('/email-nao-verificado', 'App\Http\Controllers\Auth\EmailController@emailNaoVerificado')->name('email.verificar');
Route::get('/email-verificacao', 'App\Http\Controllers\Auth\EmailController@verificar')->name('email.verificado');
Route::post('/email-recuperar-senha', 'App\Http\Controllers\Auth\EmailController@recuperarSenha')->name('email.recuperar-senha');
Route::get('/recuperar-senha', 'App\Http\Controllers\Auth\LoginController@recuperarSenha');
Route::patch('/senha-alterada', 'App\Http\Controllers\Auth\LoginController@senhaAlterada')->name('login.senha-alterada');
Route::group(['prefix' => 'home', 'middleware' => ['autenticacao', 'verificado']], function(){
    Route::get('/inicio','App\Http\Controllers\Front\PrincipalController@index')->name('tela-principal');
    //Rota acima ir diretamente para o chat onde pode conter avisos.
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
//Back
Route::get('/admin','App\Http\Controllers\Back\AdministradorController@login')->name('admin.login');
Route::post('/admin-autenticar','App\Http\Controllers\Back\AdministradorController@autenticar')->name('admin.autenticar');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/principal','App\Http\Controllers\Back\AdministradorController@principal')->name('admin.principal');
    Route::resource('/exercicio','App\Http\Controllers\Back\ExercicioController');
});
//Rota de Fallback
Route::fallback(function(){return redirect()->route('login.index')->with('alert',['mensagem' => "A rota acessada no momento não existe ou foi desabilitada", 'classe' => 'alert-danger show']);});