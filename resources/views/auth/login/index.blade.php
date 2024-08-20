@extends('template.login')
@section('titulo', 'Login')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-3 d-flex justify-content-center my-5 py-3 px-0 mx-2 border border-1 border-dark flex-wrap background-black">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 d-flex justify-content-center mb-3">
                    <img src="{{asset('logo.png')}}" style="width:55px; height:55px;">
                </div>
                <div class="col-12 px-2">
                    @component('auth.login.form.form')
                    @endcomponent
                </div>
            </div>
            <div class="col-12 px-2 d-flex justify-content-end d-block">
                <a class="text-cyan" href="{{route('cadastro.index')}}" >Precisa de uma conta na Fit Daily? Cadastre-se aqui!</a>
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
