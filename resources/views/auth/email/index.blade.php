@extends('template.login')
@section('titulo', 'Verificar Email')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-3 justify-content-center my-5 py-3 px-0 mx-2 border border-1 border-dark background-black">
            <div>
                @include('components.logo.logo')
            </div>
            <p class="ps-2 text-white align-items-center">Olá! Você se cadastrou na <strong>Fitdaily</strong>, mas ainda não verificou seu e-mail.</p>
            <p class="ps-2 text-white align-items-center">Se você acha que isso pode ser um engano ou se precisar de ajuda, por favor, entre em contato conosco.</p>
            <p class="ps-2 text-white fw-bolder text-center">Email: contato.fitdaily@gmail.com</p>
        </div>
    </section>
@endsection
@section('script')
@endsection