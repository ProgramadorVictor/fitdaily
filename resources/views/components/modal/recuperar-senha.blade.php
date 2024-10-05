<div class="modal fade" id="modal-recuperar-senha" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-custom-black text-center">
                <h5 class="modal-title text-white">Recuperação de senha</h5>
            </div>
            <div class="modal-body bg-custom-black">
                <form method="post" action="{{route('login.recuperar')}}" autocomplete="off">
                    @csrf
                    <p class="text-white text-break mb-3 lead">
                        <strong>Olá,</strong><br>
                        Se você esqueceu sua senha, basta digitar seu e-mail abaixo. Ao clicar no botão <strong>(Enviar solicitação)</strong>, você receberá um e-mail para redefinir sua senha. Caso não encontre o e-mail na caixa principal, verifique também a pasta de spam.
                    </p>
                    <p class="text-white text-break mb-0">
                        Atenciosamente,<br>
                        <strong>{{config('app.name')}}</strong>
                    </p>                        
                    <div class="input-group flex-nowrap mb-4">
                        <input name="email" type="email" class="form-control fw-bolder border-dark" placeholder="Email">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="col-12 btn btn-primary border-2 border-dark bg-custom-red rounded-3">Enviar solicitação</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>