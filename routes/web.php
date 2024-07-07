<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SimplesEmail;
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

Route::get('/', function () {return view('login.index');});

Route::get('/login','App\Http\Controllers\Front\LoginController@login')->name('login');
Route::post('/logar','App\Http\Controllers\Front\LoginController@logar')->name('logar');
Route::get('/logout','App\Http\Controllers\Front\LoginController@logout')->name('logout');
Route::get('/recuperar-senha','App\Http\Controllers\Front\LoginController@recuperarSenha')->name('recuperar-senha');

Route::get('/cadastro','App\Http\Controllers\Front\CadastroController@cadastro')->name('cadastro');
Route::post('/cadastro-realizado','App\Http\Controllers\Front\CadastroController@cadastrar')->name('cadastro-realizado');

Route::middleware('autenticacao')->group(function(){
    Route::get('/principal','App\Http\Controllers\Front\PrincipalController@index')->name('tela-principal');
    Route::get('/perfil','App\Http\Controllers\Front\PrincipalController@perfil')->name('perfil');
    Route::get('/treinos','App\Http\Controllers\Front\PrincipalController@treinos')->name('treinos');
    Route::get('/financeiro','App\Http\Controllers\Front\PrincipalController@financeiro')->name('financeiro');
    Route::get('/agenda','App\Http\Controllers\Front\PrincipalController@agenda')->name('agenda');
    // Route::get('/alunos-e-treinos','App\Http\Controllers\Front\PrincipalController@alunos')->name('alunos-treinos');

    Route::post('/atualizar-perfil','App\Http\Controllers\Front\UsuarioController@atualizar')->name('atualizar-perfil');

    Route::get('/extratos','App\Http\Controllers\Front\FinanceiroController@extratos')->name('extratos');
    Route::get('/planos','App\Http\Controllers\Front\FinanceiroController@planos')->name('planos');

    Route::post('/pagamento', 'App\Http\Controllers\Front\PagamentoController@realizarPagamento')->name('pagamento');
    Route::get('/pagamento-sucesso', 'App\Http\Controllers\Front\PagamentoController@success')->name('pagamento-sucesso');
    
});

