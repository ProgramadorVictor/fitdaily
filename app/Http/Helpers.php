<?php

use App\Models\Usuario;

if(!function_exists('format_data')){
    function format_data($data):string{
        $data_explode = explode("/", $data);
        return $data_explode[2]."-".$data_explode[1]."-".$data_explode[0];
    }     
}
if(!function_exists('menu')){
    function menu():array{
        return [
            ['nome' => 'Chat', 'route' => 'tela-principal'],
            ['nome' => 'Perfil', 'route' => 'usuario.perfil'],
            ['nome' => 'Planos', 'route' => 'financeiro-pagamento.planos'],
            ['nome' => 'Extratos', 'route' => 'financeiro-pagamento.extratos'],
            ['nome' => 'Treinos', 'route' => 'usuario.treinos'],
            ['nome' => 'Logout', 'route' => 'login.logout'],
        ];
    }     
}
