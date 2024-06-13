// $(document).ready(function(){
//     $('.alert').removeClass('fade show');
// });
// setTimeout(function(){
//     $('.alert').addClass('fade show');
// }, 100);
setTimeout(function(){
    $('.alert').alert('close');
}, 1500);
//Temporizador para fechar o alerta!

$('.celular').mask('(00) 00000-0000');
$('.cpf').mask('000.000.000-00');
$('.nascimento').mask('00/00/0000');