<form action="{{route('usuario.atualizar')}}" enctype="multipart/form-data" method="post" autocomplete="off">
    @csrf
    @method('patch')
    <input name="imagem" type="file" class="display-none">
    <p class="text-white fw-bolder">Celular:</p>
    <div class="input-group flex-nowrap my-2">
        <input value="{{session('usuario')['celular']}}" name="celular" type="text" class="celular form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Celular" aria-describedby="addon-wrapping">
    </div>
    <div class="d-flex">
        <p class="text-white fw-bolder">Email:</p>
        <span id="avisoEmail" class="text-danger d-none">
            Se você mudar seu e-mail, perderá o acesso à plataforma até verificar o novo e-mail. Para voltar a usar a conta, será necessário verificar o novo e-mail.
        </span>
    </div>
    <div class="input-group flex-nowrap my-2">
        <input value="{{session('usuario')['email']}}" name="email" type="email" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Email" aria-describedby="addon-wrapping">
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Atualizar</button>
    </div>
</form>