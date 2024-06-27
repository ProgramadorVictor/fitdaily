@extends('template.login')
@section('titulo', 'Login')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 d-flex justify-content-center my-5 py-3 px-0 mx-2 border border-1 border-dark flex-wrap background-black">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 d-flex justify-content-center mb-3">
                    <i class="fa fa-user fa-3x text-white" aria-hidden="true"></i>
                </div>
                <div class="col-12 px-2">
                    <form method="post" action="{{route('logar')}}" autocomplete="off">
                        @csrf
                        <div class="input-group flex-nowrap my-2">
                            <input value="{{old('txtLogin')}}" name="txtLogin" type="text" class="cpf form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Digite seu CPF" aria-label="USUÁRIO" aria-describedby="addon-wrapping">
                        </div>
                        <div class="input-group flex-nowrap mt-5">
                            <input value="{{old('txtSenha')}}" name="txtSenha" type="password" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Senha" aria-label="SENHA" aria-describedby="addon-wrapping">
                        </div>
                        <div class="col-12 px-2 my-2 d-flex justify-content-start d-block">
                            <a id="modal-recuperar-senha" class="d-flex justify-content-end text-cyan" href="#">Esqueceu a senha?</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Acessar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 px-2 d-flex justify-content-end d-block">
                <a class="text-cyan" href="{{route('cadastro')}}" >Precisa de uma conta na Fit Daily? Cadastre-se aqui!</a>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    var modal = new bootstrap.Modal( $('.modal')[0]);

    $('#modal-recuperar-senha').on('click', function(){
        modal.show();
    });
</script>
@endsection
