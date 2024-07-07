<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use MercadoPago\Preference;
use MercadoPago\Item;
use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\Usuario;
use App\Models\Extrato;
// use MercadoPago\Payment;
use Illuminate\Support\Carbon;

class PagamentoController extends Controller
{
    //Pagamento é completamente fictico, pois é necessário um dominio para ter mais "segurança", pelo que entendi, tem muitas dificuldades para um locahost, configurar corretamente.
    public function realizarPagamento(Request $req)
    {
        $preference = new Preference();
        $assinatura = $req->input('Assinatura');

        $item = new Item();
        if ($assinatura == "1") {
            $item->title = 'Assinatura Mensal';
            $item->unit_price = 100.00;
        } elseif ($assinatura == "2") {
            $item->title = 'Assinatura Trimestral';
            $item->unit_price = 255.00;
        } elseif ($assinatura == "3") {
            $item->title = 'Assinatura Anual';
            $item->unit_price = 960.00;
        } 

        session(['assinatura' => $req->Assinatura]);

        $item->quantity = 1;
        $preference->items = array($item);

        $preference->back_urls = [
            "success" => route('pagamento-sucesso'),
            "pending" => route('tela-principal'),
            "failure" => route('tela-principal'),
        ];

        $preference->auto_return = "approved";
        $preference->save();
        
        return redirect($preference->init_point);
    }
    public function success(Request $req) {

        $dados = [   
            'usuario_id' => session('usuario')['id'], 
            'assinatura_id' => session('assinatura'),
            'identificador' => $req->input('collection_id'),
            'status_de_pagamento' => $req->input('collection_status'),
            'tipo_de_pagamento' => $req->input('payment_type'),
            'transacao_de_pedido' => $req->input('merchant_order_id'),
        ];
        
        $pagamento = Pagamento::create($dados);
    
        $id_usuario_atual = session('usuario')['id'];
        $usuario  = Usuario::find($id_usuario_atual);

        $data_fim_atual = $usuario->data_fim_academia;
        
        if ($data_fim_atual && Carbon::parse($data_fim_atual)->isFuture()) {
            $data_inicio_academia = Carbon::parse($data_fim_atual)->addDay();
        } else {
            $data_inicio_academia = Carbon::now();
        }

        if (session('assinatura') == 1 && $dados['status_de_pagamento'] == 'approved') {
            $data_fim_academia = $data_inicio_academia->copy()->addDays(30);
        } elseif (session('assinatura') == 2 && $dados['status_de_pagamento'] == 'approved') {
            $data_fim_academia = $data_inicio_academia->copy()->addDays(90);
        } elseif (session('assinatura') == 3 && $dados['status_de_pagamento'] == 'approved') {
            $data_fim_academia = $data_inicio_academia->copy()->addDays(365);
        }

        // $payment = Payment::find_by_id($dados['identificador']);
    
        if (isset($data_fim_academia)) {
            $extrato = [
                'pagamento_id' => $pagamento->id,
                'assinatura_id' => session('assinatura'),
                'usuario_id' => session('usuario')['id'],
                // 'valor' =>  $payment->transaction_amount,
                'data_pagamento' => now(),
                'data_vencimento' => $data_fim_academia,
            ];
            Extrato::create($extrato);
    
            $usuario->data_inicio_academia = now();
            $usuario->data_fim_academia = $data_fim_academia;
            $usuario->update();
        }
    
        $req->session()->forget('assinatura');
    
        return redirect()->route('tela-principal');
    }
    
}
