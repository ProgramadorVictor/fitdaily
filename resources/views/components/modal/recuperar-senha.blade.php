<div class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between border-0 modal-border background-black">
                <h5 class="modal-title text-white">Recuperação de senha</h5>
                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body background-black pt-0">
                <form method="post" action="{{route('email.recuperar-senha')}}" autocomplete="off">
                    @csrf
                    <hr class="text-white">
                    <p class="text-white">
                        Olá, <br>
                        Caso tenha esquecido a senha, digite o seu email abaixo. <br>
                        Ao clica no botão <strong>(Enviar solicitação)</strong> <br>
                        Será enviado um email de redefinição de senha! <br>
                        Caso não tenha encontrado nada na caixa principal verifique a caixa de spam <br>
                        <br>
                        Atenciosamente, <br>
                        {{config('app.name')}}
                        
                    </p>
                    <div class="input-group flex-nowrap mb-4">
                        <input name="email" type="email" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Email" aria-describedby="addon-wrapping">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Enviar solicitação</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>