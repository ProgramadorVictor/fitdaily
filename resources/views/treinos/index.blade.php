@extends('template.front')
@section('titulo', 'Meu Treino')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <ul class="col-12 p-0 list-unstyled background-black d-flex justify-content-center flex-wrap">
                @forelse($treinos as $treino)
                    <li class="d-flex justify-content-center col-12 d-block text-center mb-4 background-red">
                        <a href="{{route('usuario.exercicios', ['treino' => $treino])}}" class="col-10 p-1 text-white text-decoration-none fw-bolder d-flex">
                            <p class="d-flex justify-content-center col-12 m-0 ps-2">{{$treino->nome}}</p>
                        </a>
                    </li>
                    @empty
                        <p class="text-white">No momento não tem treinos</p>
                @endforelse 
            </ul>
        </div>
    </section>
@endsection
@section('script')
@endsection