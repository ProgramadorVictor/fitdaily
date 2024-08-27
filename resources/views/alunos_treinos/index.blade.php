@extends('template.front')
@section('titulo', 'Alunos e Treinos')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5 mini-screen">
            <ul class="col-12 p-0 list-unstyled background-black d-flex justify-content-center flex-wrap ">
                @forelse($alunos as $aluno)
                    <li class="col-12 d-block text-center mb-0 background-red mb-3">
                        <a href="{{route('alunos-treinos.aluno', ['aluno' => $aluno])}}" class="p-1 text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end">
                            <p class="d-flex justify-content-center col-12 m-0 ps-2">{{$aluno->nome.' '.$aluno->sobrenome}} - {{$aluno->tipo_id == 1 ? 'Aluno' : 'Treinador'}}</p>
                        </a>
                    </li>
                    @empty
                        <p class="text-white">No momento não tem alunos</p>
                @endforelse
            </ul>
        </div>
    </section>
@endsection
@section('script')
@endsection