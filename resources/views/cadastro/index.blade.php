@extends('template.login')
@section('titulo', 'Cadastro')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 d-flex justify-content-center my-5 py-3 px-0 mx-2 border border-1 border-dark flex-wrap background-black">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 d-flex justify-content-center">
                    <p class="text-white">Registre-se para se juntar a nós</p>
                </div>
                <div class="col-12 px-2">
                    <form method="post" action="{{route('cadastro-realizado')}}" autocomplete="off">
                        @csrf
                        <div class="col-6 input-group flex-nowrap mb-4">
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
                </div>
            </div>
            <div class="col-12 px-2 d-flex justify-content-end d-block">
                <a href="{{route('login')}}" class="text-cyan">Você já tem uma conta? Faça login aqui!</a>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.disable-cut-copy-paste').on("cut copy paste", function(e){
                e.preventDefault();
            });
        });
        $('input[name="nome"]').on("blur", function(){
            $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().slice(1));
        });
        $('input[name="sobrenome"]').on("blur", function(){
            $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().slice(1));
        });
    </script>
@endsection
