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
            <a class="col-12 btn btn-success border-0 text-white fw-bolder border-radius-none mb-4" href="{{route('exercicio.create')}}">
                Adicionar
            </a>
            <ul class="col-12 p-0 list-unstyled background-black d-flex justify-content-center flex-wrap mini-screen">
                @forelse($exercicios as $exercicio)
                    <li class="col-12 d-block text-center mb-0 background-red mb-3">
                        <a id="{{$exercicio->id}}" href="#" class="exercicio p-1 text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end">
                            <p class="d-flex justify-content-center col-12 m-0 ps-2">{{$exercicio->nome}}</p>
                            <i id="icoDown{{$exercicio->id}}" class="fa fa-caret-down" aria-hidden="true"></i>
                            <i id="icoUp{{$exercicio->id}}" class="fa fa-caret-up d-none" aria-hidden="true"></i>
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
        $('.exercicio').on('click',function(){
            var id = $(this).attr('id');
            var elemento = $('#imagem_'+id);
            if(elemento.hasClass('d-none')){
                $('.imagem').addClass('d-none');
                elemento.removeClass('d-none');
                $('#icoDown'+id).toggleClass('d-none');
                $('#icoUp'+id).toggleClass('d-none');
            }else{
                $('#icoDown'+id).toggleClass('d-none');
                $('#icoUp'+id).toggleClass('d-none');
                elemento.addClass('d-none');
            }
        });
    </script>
@endsection