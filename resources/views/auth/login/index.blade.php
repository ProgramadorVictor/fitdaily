@extends('template.auth')
@section('titulo', 'Login')
@section('body')
    @include('components.modal.recuperar-senha')
    <section class="col-11 col-sm-8 col-md-6 col-lg-4 col-xl-3 m-auto bg-custom-black border border-2 border-custom-black rounded-3">
        <header class="text-center">
            <img src="{{asset('logo.png')}}" class="logo">
            <p class="text-white">Bem-vindo!<br>Vamos malhar?</p>
        </header>
        <main class="mx-2">
            @component('auth.login.form.form')
            @endcomponent
        </main>
        <footer class="mx-2">
            <a href="#">Preciso de ajuda?</a>
            <a href="#" id="linkModal">Esqueceu a senha?</a>
            <a href="{{route('cadastro.index')}}">Registre-se aqui!</a>
        </footer>
    </section>
@endsection
@section('script')
    <script>
        $('#linkModal').on('click', function(){
            $('#modal-recuperar-senha').modal('show');
        });
    </script>
@endsection