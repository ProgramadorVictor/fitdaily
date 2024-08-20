<form method="post" action="{{route('admin.autenticar')}}" autocomplete="off">
    @csrf
    <div class="input-group flex-nowrap mt-5">
        <input value="{{old('cpf')}}" name="cpf" type="text" class="cpf form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="CPF" aria-label="USUÁRIO" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mt-5">
        <input id="senha_1" value="{{old('senha')}}" name="senha" type="password" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark input-senha" placeholder="Senha" aria-label="SENHA" aria-describedby="addon-wrapping">
        <span class="p-1 border-dark input-group-text border-none bg-white border-radius-none border border-2 span-senhas"  onclick="verSenha()">
            <i class="fa fa-1x fa-eye senha_1" aria-hidden="true"></i>
            <i class="fa fa-1x fa-eye-slash d-none senha_1" aria-hidden="true"></i>
        </span>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Acessar</button>
    </div>
</form>