<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('usuario')){
            return $next($request);
        }else{
            $dados = [
                "mensagem" => "Você precisa de autenticação para acessar essa página.",
                'classe' => "alert-danger show"
            ];
            return redirect()->route('login')->with('alert', ['dados' => $dados]);
        }
    }
}
