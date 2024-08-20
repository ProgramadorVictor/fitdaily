setTimeout(function(){
    $('.alert').alert('close');
}, 4500);

$('.celular').mask('(00) 00000-0000');
$('.cpf').mask('000.000.000-00');
$('.nascimento').mask('00/00/0000');

//Para menu.blade.php
$('#clickFinanceiro').on('click',function(){
    $('#menuFinanceiro').toggleClass('d-none');
    $('#icoUp').toggleClass('d-none');
    $('#icoDown').toggleClass('d-none');
});
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