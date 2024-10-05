<?php

namespace App\Http;

use Illuminate\Support\Facades\Log;

class Message{
    public static function success($mensagem, $route, $adicional = null){
        Log::info($mensagem);
        return redirect()->route($route)->with('alert', [
            'mensagem' => $mensagem . $adicional,
            'classe' => 'alert-success show'
        ]); 
    }
    public static function danger($mensagem, $route, $adicional = null){
        Log::info($mensagem);
        return redirect()->route($route)->with('alert', [
            'mensagem' => $mensagem . $adicional,
            'classe' => 'alert-danger show'
        ]); 
    }
    public static function exception($mensagem, $route){
        Log::error($mensagem);
        return redirect()->route($route)->with('alert', [
            'mensagem' => 'Ocorreu um erro inesperado, por favor reporte ao email contato.fitdaily@gmail.com',
            'classe' => 'alert-danger show'
        ]);
    }
}