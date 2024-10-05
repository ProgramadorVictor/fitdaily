<?php

use App\Models\Usuario;

if(!function_exists('format_data')){
    function format_data($data):string{
        $data_explode = explode("/", $data);
        return $data_explode[2]."-".$data_explode[1]."-".$data_explode[0];
    }     
}