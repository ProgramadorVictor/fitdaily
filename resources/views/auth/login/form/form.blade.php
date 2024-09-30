<form method="post" action="{{route('login.logar')}}" autocomplete="off">
    @csrf
    <div class="input-group">
        <input value="{{old('cpf')}}" name="cpf" type="text" placeholder="Digite seu CPF" class="cpf form-control fw-bolder border-dark" >
    </div>
    <div class="input-group">
        <input id="senha_1" value="{{old('senha')}}" name="senha" type="password" placeholder="Senha" class="form-control fw-bolder border-dark input-senha" >
        <span class="input-group-text bg-white span-senhas" onclick="verSenha()">
            <i class="fa fa-1x fa-eye senha_1" aria-hidden="true"></i>
            <i class="fa fa-1x fa-eye-slash d-none senha_1" aria-hidden="true"></i>
        </span>
    </div>
    <div>
        <button type="submit" class="col-12 btn btn-primary border-2 border-dark bg-custom-red rounded-3">Acessar</button>
    </div>
</form>