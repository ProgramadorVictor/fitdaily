@extends('template.cadastro')
@section('titulo', 'Cadastro')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-3 d-flex justify-content-center my-5 py-3 px-0 mx-2 border border-1 border-dark flex-wrap background-black">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 background-black d-flex justify-content-center">
                    <img src="{{asset('logo.png')}}" style="width:55px; height:55px;">
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p class="text-white">Registre-se para se juntar a nós</p>
                </div>
                <div class="col-12 px-2">
                    @component('auth.cadastro.form.form')
                    @endcomponent
                </div>
            </div>
            <div class="col-12 px-2 d-flex justify-content-end d-block">
                <a href="{{route('login.index')}}" class="text-cyan">Você já tem uma conta? Faça login aqui!</a>
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
