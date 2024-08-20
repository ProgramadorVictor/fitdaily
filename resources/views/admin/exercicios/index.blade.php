@extends('template.back')
@section('titulo', 'Administração')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <a class="col-12 btn btn-success border-0 text-white fw-bolder border-radius-none" href="{{route('exercicio.create')}}">
                Adicionar
            </a>
            <p class="d-flex "><mark>Resolver problema ao fechar e abrir um exercicio. Ao clicar em 1 exercicio o outro deve fechar automaticamente, porém tem algum bug, olhe para as setas ao fechar e abrir um dos exercicios</mark></p>
            <ul class="col-12 p-0 list-unstyled background-black d-flex justify-content-center flex-wrap">
                @forelse($exercicios as $exercicio)
                    <li class="col-12 d-block text-center mb-0 background-red mb-3">
                        <a id="{{$exercicio->id}}" href="#" class="exercicio p-1 text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end">
                            <p class="d-flex justify-content-center col-12 m-0 ps-2">{{$exercicio->nome}}</p>
                            <i id="icoDown" class="fa fa-caret-down" aria-hidden="true"></i>
                            <i id="icoUp" class="fa fa-caret-up d-none" aria-hidden="true"></i>
                        </a>
                        <div id="imagem_{{$exercicio->id}}" class="imagem d-none col-12">
                            <div class="col-12 d-flex justify-content-center">
                                <img id="exercicio-imagem" src="{{asset('storage/'.$exercicio->imagem)}}" class="exercicio-imagem disable">
                            </div>
                            <div class="d-flex">
                                <a class="col-6 btn btn-success border-0 text-white fw-bolder border-radius-none" href="{{route('exercicio.edit', ['exercicio' => $exercicio->id])}}">
                                    Editar - {{$exercicio->nome}}
                                </a>
                                <form class="col-6" method="post" action="{{route('exercicio.destroy', ['exercicio' => $exercicio->id])}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="col-12 btn background-red border-0 text-white fw-bolder">Excluir - {{$exercicio->nome}}</button>
                                </form>                                
                            </div>
                        </div>
                    </li>
                    @empty
                        <p class="text-white">No momento não tem exercicios</p>
                @endforelse
            </ul>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('.exercicio').on('click', function(){
            var id = $(this).attr('id');
            var imagem = 'imagem_'+id;
            $('#'+imagem).toggleClass('d-none');
            $('#icoUp').toggleClass('d-none');
            $('#icoDown').toggleClass('d-none');
            $('.imagem').each(function() {
                $('.imagem').addClass('d-none');
            });
            if($('#'+imagem).hasClass('d-none')){
                $('#'+imagem).removeClass('d-none');
            }
        });
    </script>
@endsection