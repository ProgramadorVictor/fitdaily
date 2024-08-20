<form method="post" action="{{route('cadastro.cadastrar')}}" autocomplete="off">
    @csrf
    <div class="input-group flex-nowrap mb-4">
        <input name="nome" value="{{old('nome')}}" type="text" class="col-12 form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Nome" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="sobrenome" value="{{old('sobrenome')}}" type="text" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Sobrenome" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="email" value="{{old('email')}}" type="email" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Email" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="confirmacaodeemail" value="{{old('confirmacaodeemail')}}" type="email" class="disable-cut-copy-paste form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Confirmação de Email" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="cpf" value="{{old('cpf')}}" type="text" class="cpf form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="CPF" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="celular" value="{{old('celular')}}" type="text" class="celular form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Celular" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="senha" value="{{old('senha')}}" type="password" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Senha" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="confirmacaodesenha" value="{{old('confirmacaodesenha')}}" type="password" class="disable-cut-copy-paste form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Confirmação de Senha" aria-describedby="addon-wrapping">
    </div>
    <div class="input-group flex-nowrap mb-4">
        <input name="nascimento" value="{{old('nascimento')}}" type="text" class="nascimento form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Nascimento" aria-describedby="addon-wrapping">
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Cadastrar</button>
    </div>
</form>