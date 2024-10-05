<form method="post" action="{{route('cadastro.cadastrar')}}" autocomplete="off">
    @csrf
    <div class="input-group">
        <input name="nome_completo" value="{{old('nome_completo')}}" placeholder="Nome Completo" type="text" class="form-control fw-bolder border-dark">
    </div>
    <div class="input-group">
        <input name="cpf" value="{{old('cpf')}}" type="text" placeholder="CPF" class="cpf form-control fw-bolder border-dark">
    </div>
    <div class="input-group">
        <input name="email" value="{{old('email')}}" type="email" placeholder="Email" class="form-control fw-bolder border-dark">
    </div>
    <div class="input-group">
        <input name="email_confirmation" value="{{old('email_confirmation')}}" type="email" placeholder="Confirmação de Email" class="disable-cut-copy-paste form-control fw-bolder border-dark">
    </div>
    <div class="input-group">
        <input name="celular" value="{{old('celular')}}" type="text" class="celular form-control fw-bolder border-dark" placeholder="Celular">
    </div>
    <div class="input-group">
        <input name="senha" id="senha_1" value="{{old('senha')}}" type="password" class="form-control fw-bolder border-dark" placeholder="Senha">
        @component('auth.show-hide-password')
        @endcomponent
    </div>
    <div class="input-group">
        <input name="senha_confirmation" value="{{old('senha_confirmation')}}" type="password" placeholder="Confirmação de Senha" class="disable-cut-copy-paste form-control fw-bolder border-dark">
    </div>
    <div class="input-group">
        <input name="nascimento" value="{{old('nascimento')}}" type="text" class="nascimento form-control fw-bolder border-dark" placeholder="Nascimento">
    </div>
    <div>
        <button type="submit" class="col-12 btn btn-primary border-2 border-dark bg-custom-red rounded-3">Cadastrar</button>
    </div>
</form>