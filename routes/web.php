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

Route::group([], function () {
    Route::get('/login', 'App\Http\Controllers\Login\LoginController@login')->name('login');
    Route::post('/login', 'App\Http\Controllers\Login\LoginController@logar')->name('logar');
    Route::get('/logout', 'App\Http\Controllers\Login\LoginController@logout')->name('logout');

    Route::get('/recuperar-senha', 'App\Http\Controllers\Login\LoginController@recuperarSenha')->name('recuperar-senha');

    Route::get('/cadastro', 'App\Http\Controllers\Login\CadastroController@cadastro')->name('cadastro');
    Route::post('/cadastro', 'App\Http\Controllers\Login\CadastroController@cadastrar')->name('cadastro-realizado');
});
Route::group(['prefix' => "home", "middleware" => "autenticacao"], function(){
    Route::get('/principal','App\Http\Controllers\Front\PrincipalController@index')->name('tela-principal');
    Route::get('/perfil','App\Http\Controllers\Front\PrincipalController@perfil')->name('perfil');
    Route::get('/treinos','App\Http\Controllers\Front\PrincipalController@treinos')->name('treinos');
    Route::get('/financeiro','App\Http\Controllers\Front\PrincipalController@financeiro')->name('financeiro');
    Route::get('/agenda','App\Http\Controllers\Front\PrincipalController@agenda')->name('agenda');
    
    Route::post('/atualizar-perfil','App\Http\Controllers\Front\UsuarioController@atualizar')->name('atualizar-perfil');
    Route::get('/extratos','App\Http\Controllers\Front\FinanceiroController@extratos')->name('extratos');
    Route::get('/planos','App\Http\Controllers\Front\FinanceiroController@planos')->name('planos');
    Route::post('/pagamento', 'App\Http\Controllers\Front\PagamentoController@realizarPagamento')->name('pagamento');
    Route::get('/pagamento-sucesso', 'App\Http\Controllers\Front\PagamentoController@success')->name('pagamento-sucesso');
});
Route::fallback(function(){
    return redirect()->route('tela-principal');
});