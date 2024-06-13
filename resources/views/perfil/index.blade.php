@extends('template.front')
@section('tittle', 'Perfil')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <div class="background-black my-2 ps-2">
        <a href="{{route('tela-principal')}}" class="text-decoration-none text-white"><i class="fa fa-home" aria-hidden="true"></i> Tela Principal</a>
    </div>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <div class="col-12 px-2">
                <form action="{{route('atualizar-perfil')}}" enctype="multipart/form-data" method="post" autocomplete="off">
                    @csrf
                    <div class="d-block">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn border border-2 border-dark p-4 background-red d-flex justify-content-center icon-foto">
                                @if(isset($sessao['perfil_foto']) && $sessao['perfil_foto'] != '')
                                    <img src="{{ asset('storage/'.$sessao['perfil_foto']) }}" class="icon-foto">
                                @else
                                    <i class="fa fa-user fa-3x text-white" aria-hidden="true"></i>
                                @endif
                            </button>
                            <input id="teste" name="txtImagem" type="file" class="display-none">
                        </div>
                        <div class="col-12 text-center">
                            <p class="text-white d-block m-b-1"> Olá, Como vai?</p>
                            <p class="text-white d-block fw-bolder m-0">{{$sessao['nome'].' '.$sessao['sobrenome']}}</p>
                        </div>
                    </div>
                    <label class="text-white fw-bolder" for="">Celular:</label>
                    <div class="input-group flex-nowrap my-2">
                        <input value="{{$sessao['celular']}}" name="txtCelular" type="text" class="celular form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Celular" aria-describedby="addon-wrapping">
                    </div>
                    <label class="text-white fw-bolder" for="">Email:</label>
                    <div class="input-group flex-nowrap my-2">
                        <input value="{{$sessao['email']}}" name="txtEmail" type="email" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Email" aria-describedby="addon-wrapping">
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
        $('.icon-foto').on('click', function(){
            $('#teste').trigger('click');
        });
    </script>
@endsection