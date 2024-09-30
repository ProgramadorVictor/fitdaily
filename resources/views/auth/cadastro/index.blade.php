@extends('template.auth')
@section('titulo', 'Cadastro')
@section('body')
    <section class="col-11 col-sm-8 col-md-6 col-lg-4 col-xl-3 m-auto bg-custom-black border border-2 border-custom-black rounded-3">
        <header class="text-center">
            <img src="{{asset('logo.png')}}" class="logo">
            <p class="text-white">Venha nos conhecer!<br>Registre-se e junte-se a nós.</p>
        </header>
        <main class="mx-2">
            @component('auth.cadastro.form.form')
            @endcomponent
        </main>
        <footer class="text-center">
            <a href="{{route('login.index')}}" class="mx-2">Já tem uma conta?<br>Clique aqui para fazer login!</a>
        </footer>
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
