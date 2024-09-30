function verSenha(){
    $('.senha_1').toggleClass('d-none');
    if($('#senha_1').attr('type') == 'password'){
        $('#senha_1').attr('type', 'text');
    }else{
        $('#senha_1').attr('type', 'password');
    }
}
function verSenhaConfirmacao(){
    $('.senha_2').toggleClass('d-none');
    if($('#senha_2').attr('type') == 'password'){
        $('#senha_2').attr('type', 'text');
    }else{
        $('#senha_2').attr('type', 'password');
    }
}