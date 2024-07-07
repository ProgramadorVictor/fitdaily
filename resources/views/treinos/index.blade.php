@extends('template.front')
@section('titulo', 'Principal')
@section('body')
    <div class="background-black px-2">
        <a href="{{ route('tela-principal') }}" class="text-decoration-none text-white">
            <i class="fa fa-home" aria-hidden="true"></i> Tela Principal
        </a>
    </div>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            @foreach($treinos as $treino)
                @foreach($treino->exercicios as $exercicio)
                    <button class="col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $exercicio->id }}" aria-expanded="false" aria-controls="collapseExample{{ $exercicio->id }}">
                        <p class="col-12 fw-bolder text-center my-2">{{ $exercicio->nome }}</p>
                    </button>
                    <div class="collapse mb-2" id="collapseExample{{ $exercicio->id }}">
                        <div class="card border-dark border-2 background-black p-3 border-radius-none">
                            <div class="d-flex justify-content-center py-3">
                                <img width="250" src="{{ $exercicio->caminho }}" class="img-fluid"> <!-- Exemplo: exibição de uma imagem associada ao exercício -->
                            </div>
                            <div class="row">
                                @for ($i = 1; $i <= 3; $i++)
                                    <div class="col-12 col-md-4 mb-3">
                                        <div class="card text-white bg-secondary h-100">
                                            <div class="card-header">Série {{$i}}</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="reps{{ $exercicio->id }}-{{ $i }}">Repetições</label>
                                                    <input type="text" class="form-control" id="reps{{ $exercicio->id }}-{{ $i }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="peso{{ $exercicio->id }}-{{ $i }}">Carga (Kg)</label>
                                                    <input type="text" class="form-control" id="peso{{ $exercicio->id }}-{{ $i }}">
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input type="checkbox" class="form-check-input" id="completo{{ $exercicio->id }}-{{ $i }}">
                                                    <label class="form-check-label" for="completo{{ $exercicio->id }}-{{ $i }}">Concluído</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>
@endsection
@section('script')
@endsection
