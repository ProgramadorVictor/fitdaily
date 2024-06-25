var modal = document.querySelector('.modal');

var esqueciSenhaLink = document.getElementById('esqueciSenhaLink');
esqueciSenhaLink.addEventListener('click', function(event) {
    var modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
});

var modal = document.querySelector('.modal');

var esqueciSenhaLink = document.getElementById('esqueciSenhaLink');
esqueciSenhaLink.addEventListener('click', function(event) {
    var modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
});

var closeModalBtn = document.querySelector('.btn-close');
closeModalBtn.addEventListener('click', function() {
    var modalInstance = new bootstrap.Modal(modal);
    modalInstance.hide();
}); 

var loginBtn = document.getElementById('btnLogin'); 
loginBtn.addEventListener('click', function() {
    window.location.href = "../tela_inicial/index.html";
});

var esqueciSenha = document.getElementById('btnEsqueciSenha'); 
esqueciSenha.addEventListener('click', function() {
    // alert("Senha alterada com sucesso!");
}); 

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', function(event) {
        // alert('Cadastro realizado com sucesso!');
    });
});
