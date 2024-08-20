@extends('template.front')
@section('titulo', 'Perfil')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
        @media (min-width: 1024px) {
            section > div.col-12.my-5{
                display:flex;
                justify-content: space-around;
            }
            #foto-div{
                width: 40%;
            }
            .icon-foto{
                width: 20rem;
                height: 20rem;
                border-radius: 50%;
            }
        }
        @media (max-width: 1023px) {
            #foto-div {
                width: 100% !important;
            }
            section > div > div.col-6.d-flex.justify-content-center.align-items-center{
                width: 100%;
            }
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 my-5">
            <div id="foto-div" class="d-block col-6">
                <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn border-0 p-0 background-red d-flex justify-content-center icon-foto align-items-center">
                        @if(isset(session('usuario')['imagem']) && session('usuario')['imagem'] != '')
                            <img id="foto-perfil" src="{{ asset('storage/'. session('usuario')['imagem'])}}" class="icon-foto disable">
                        @else
                            <i id="foto-padrao" class="fa fa-user fa-3x text-white disable" aria-hidden="true"></i>
                        @endif
                    </button>
                </div>
                <div class="text-center">
                    <p class="text-white d-block m-b-1"> Olá, Como vai?</p>
                    <p class="text-white d-block fw-bolder m-0">{{session('usuario')['nome'].' '.session('usuario')['sobrenome']}}</p>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center px-2">
                <div class="col-12">
                    @component('usuario.form.form')
                    @endcomponent
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('input[name="email"]').on('click', function(){
            $('#avisoEmail').removeClass('d-none');
        });
        $('button.icon-foto').on('click', function(){
            $('input[name="imagem"]').trigger('click');
        });
        $('input[name="imagem"]').on('change', function(event) {
            var arquivo = event.target.files[0];
            if (arquivo) {
                var url = URL.createObjectURL(arquivo);
                if ($('#foto-perfil').length) {
                    $('button .icon-foto').attr('src', url);
                    $('div .icon-foto').attr('src', url);
                } else {
                    $('.icon-foto').html('<img id="foto-perfil" src="' + url + '" class="icon-foto">');
                }
            }
        });
    </script>
@endsection