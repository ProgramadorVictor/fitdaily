<?php

namespace App\Http;

class Menu{
    public static function opcoes(){
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