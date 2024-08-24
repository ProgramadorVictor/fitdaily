<?php

namespace App\Http\Controllers\Front;

use Exception;
use Illuminate\Http\Request;
use App\Models\Assinatura;
use App\Http\Controllers\Controller;
use MercadoPago\Preference;
use MercadoPago\Item;
use Illuminate\Support\Carbon;
use App\Models\Pagamento;
use App\Models\Extrato;
class FinanceiroPagamentoController extends Controller
{
    public function planos(){
        $assinaturas = Assinatura::all();
        return view('financeiro.planos.index', ['assinaturas' => $assinaturas]);
    }
    public function realizarPagamento(Request $request){
        $preference = new Preference();
        $item = new Item();

        $assinatura = Assinatura::find($request->input('assinatura'));
        if ($assinatura) {
            $item->title = $assinatura->descricao;
            $item->unit_price = $assinatura->valor;
        }else{
            $item->title = 'Assinatura Não Encontrada';
            $item->unit_price = 0.00;
        }
        $item->title = $assinatura->descricao;
        $item->quantity = 1;
        $preference->items = [$item];
        $preference->back_urls = [
            "success" => route('financeiro-pagamento.pagamento-sucesso'),
            "pending" => route('financeiro-pagamento.pagamento-pendente'),
            "failure" => route('financeiro-pagamento.pagamento-falha'),
        ];
        $preference->auto_return = "approved";
        $preference->save();
        session(['produto' => ['id' => $request->input('assinatura'), 'valor' => $item->unit_price]]);
        return redirect($preference->init_point);
    }
    public function success(Request $req) {
        $regras = [
            'collection_id' => 'unique:pagamentos,collection_id',
            'payment_id' => 'unique:pagamentos,payment_id',
        ];
        $feedback = [
            'unique' => "Algo está errado no pagamento, por favor entre em contato com o suporte",
        ];
        $req->validate($regras, $feedback);
        if(!($req->input('collection_id') != $req->input('payment_id'))){
            try{
                $dados = [
                    'usuario_id' => session('usuario')['id'],
                    'assinatura_id' => session('produto')['id'],
                    'collection_id' => $req->input('collection_id'),
                    "collection_status" => $req->input('collection_status'),
                    "payment_id" => $req->input('payment_id'),
                    "status" => $req->input('status'),
                    "payment_type" => $req->input('payment_type'),
                    "preference_id" => $req->input('preference_id')
                ];
                $pagamento = Pagamento::create($dados);
                $assinatura = $pagamento->assinatura;
                $data_fim_atual = $pagamento->usuario->data_fim_academia;
                if ($data_fim_atual && Carbon::parse($data_fim_atual)->isFuture()) {
                    $data_inicio_academia = Carbon::parse($data_fim_atual)->addDay();
                } else {
                    $data_inicio_academia = Carbon::now();
                }
                if (session('assinatura') && $dados['status'] == 'approved') {
                    $data_fim_academia = $data_inicio_academia->copy()->addDays($assinatura->duracao);
                }
                if (isset($data_fim_academia)) {
                    $extrato = [
                        'pagamento_id' => $pagamento->id,
                        'usuario_id' => $pagamento->usuario->id,    
                        'data_pagamento' => now(),
                        'data_vencimento' => $data_fim_academia,
                    ];
                    $extrato = Extrato::create($extrato);
                    $extrato->usuario->data_inicio_academia = now();
                    $extrato->usuario->data_fim_academia = $data_fim_academia;
                    $extrato->save();
                    $extrato->usuario->save();
                }
                $req->session()->forget('produto');
                return redirect()->route('financeiro-pagamento.planos')
                ->with('alert', ['mensagem' => 'Pagamento aprovado com sucesso. Sua assinatura foi atualizada.','classe' => 'alert-success show']);
            }catch(Exception $e){
                dd($e);
                return redirect()->route('financeiro-pagamento.planos')
                ->with('alert', ['mensagem' => 'Ocorreu um erro inesperado, por favor reporte ao email contato.fitdaily@gmail.com','classe' => 'alert-danger show']);
            }
        }
    }
    public function failure(Request $Req){
        return redirect()->route('financeiro-pagamento.planos')
        ->with('alert', ['mensagem' => 'O pagamento falhou. Verifique os detalhes do pagamento e tente novamente. Se o problema persistir, entre em contato com o suporte em contato.fitdaily@gmail.com.','classe' => 'alert-danger show']);
    }
    public function pending(Request $req){
        return redirect()->route('financeiro-pagamento.planos')
        ->with('alert', ['mensagem' => 'Seu pagamento está pendente. Por favor, aguarde enquanto processamos a transação. Você será notificado quando o status for atualizado.','classe' => 'alert-warning show']);
    }
    public function extratos(){
        $extratos = Extrato::where('usuario_id', session('usuario')['id'])->orderBy('created_at', 'desc')->paginate(2);
        return view('financeiro.extratos.index', ['extratos' => $extratos]);
    }
}
