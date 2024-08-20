@extends('template.front')
@section('titulo', 'Treino de ' . $aluno->nome . ' ' . $aluno->sobrenome)
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
                    <li class="col-12 text-center m-0 background-red mb-4">
                        <a href="{{route('alunos-treinos.editar-exercicio', ['treino' => $treino])}}" class="col-12 p-1 text-white text-decoration-none fw-bolder d-flex">
                            <p class="d-flex justify-content-center col-12 m-0">{{$treino->nome}}</p>
                        </a>
                    </li>
                    @empty
                        <p class="text-white">No momento não tem treinos</p>
                @endforelse 
            </ul>
            <div class="col-12 d-flex">
                <form class="{{isset($treino) ? 'col-6' : 'col-12' }}" method="post" action="{{route('alunos-treinos.adicionar-treino', ['aluno' => $aluno])}}">
                    @csrf
                    <button type="submit" class="btn btn-success border-radius-none col-12 text-decoration-none d-flex justify-content-center p-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </form>
                @if(isset($treino))
                    <form class="col-6" method="post" action="{{route('alunos-treinos.apagar-treino', ['treino' => $treino])}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger border-radius-none col-12 text-decoration-none d-flex justify-content-center text-white p-2">
                            <i class="fa fa-1x fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection