@extends('template.front')
@section('titulo', 'Perfil')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <div class="background-black px-2">
        <a href="{{route('tela-principal')}}" class="text-decoration-none text-white"> <i class="fa fa-home" aria-hidden="true"></i> Tela Principal</a>
    </div>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <div class="col-12 px-2">
                <form action="{{route('atualizar-perfil')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                    @csrf
                    <div class="d-block">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn border-0 p-0 background-red d-flex justify-content-center icon-foto align-items-center">
                                @if(isset(session('usuario')['perfil_foto']) && session('usuario')['perfil_foto'] != '')
                                    <img id="foto-perfil" src="{{ asset('storage/'.session('usuario')['perfil_foto']) }}" class="icon-foto disable">
                                @else
                                    <i id="foto-padrao" class="fa fa-user fa-3x text-white disable" aria-hidden="true"></i>
                                @endif
                            </button>
                            <input name="txtImagem" type="file" class="display-none">
                        </div>
                        <div class="col-12 text-center">
                            <p class="text-white d-block m-b-1"> Olá, Como vai?</p>
                            <p class="text-white d-block fw-bolder m-0">{{session('usuario')['nome'].' '.session('usuario')['sobrenome']}}</p>
                        </div>
                    </div>
                    <p class="text-white fw-bolder">Celular:</p>
                    <div class="input-group flex-nowrap my-2">
                        <input value="{{session('usuario')['celular']}}" name="txtCelular" type="text" class="celular form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Celular" aria-describedby="addon-wrapping">
                    </div>
                    <p class="text-white fw-bolder">Email:</p>
                    <div class="input-group flex-nowrap my-2">
                        <input value="{{session('usuario')['email']}}" name="txtEmail" type="email" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Email" aria-describedby="addon-wrapping">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('button.icon-foto').on('click', function(){
            $('input[name="txtImagem"]').trigger('click');
        });

        $('input[name="txtImagem"]').on('change', function(event) {
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