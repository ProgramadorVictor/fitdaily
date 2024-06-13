<div class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between border-0 modal-border background-black">
                <h5 class="modal-title text-white">Recuperação de senha</h5>
                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body background-black pt-0">
                <form action="{{route('recuperar-senha')}}" autocomplete="off">
                    <hr class="text-white">
                    <p class="text-white">Digite o seu email abaixo, ao clicar em <br> <strong>"Enviar solicitação"</strong> será enviado para o email digitado uma solicitação de troca de senha. <br> Caso não encontrado na caixa principal verificar a caixa de spam</p>
                    <div class="input-group flex-nowrap mb-4">
                        <input name="txtEmail" type="email" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Email" aria-describedby="addon-wrapping">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Enviar solicitação</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>