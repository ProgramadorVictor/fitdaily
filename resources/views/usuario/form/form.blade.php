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
    </div>
    <div class="input-group flex-nowrap my-2">
        <input value="{{session('usuario')['email']}}" name="email" type="email" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark input-senha" placeholder="Email" aria-describedby="addon-wrapping">
        <span class="col-auto p-1 border-dark input-group-text border-none bg-white border-radius-none border border-2 span-senhas">
            <i id="lock" class="fa fa-lock d-none" aria-hidden="true" onclick="ativaCampo()"></i>
            <i id="unlock" class="fa fa-unlock-alt d-none" aria-hidden="true"></i>
        </span>
    </div>
    <span id="avisoEmail" class="text-danger d-none fw-bolder ">
        ATENÇÃO: Se você mudar seu e-mail, perderá o acesso à plataforma até verificar o novo e-mail. Para voltar a usar a conta, será necessário verificar o novo e-mail. Clique no cadeado para desbloquear
    </span>
    <div class="d-flex justify-content-center">
        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Atualizar</button>
    </div>
</form>