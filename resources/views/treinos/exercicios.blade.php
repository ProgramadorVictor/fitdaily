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
                @forelse($exercicios as $exercicio)
                    <div class="col-12 mb-4">
                        <div class="col-12 d-flex">
                            <a id="{{$exercicio->exercicio_id}}" class="p-1 d-flex mostrar_imagem col-12 text-center m-0 background-red text-decoration-none" href="#">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i id="icoDown" class="fa fa-1x fa-caret-down text-white" aria-hidden="true"></i>
                                    <i id="icoUp" class="fa fa-1x fa-caret-up d-none" aria-hidden="true"></i>
                                </div>
                                <li class="h-100 align-items-center d-flex justify-content-center col-12 m-0 text-white fw-bolder">
                                    {{ $exercicio->exercicios->nome }}
                                </li>
                            </a>
                        </div>
                        <div class="click_{{$exercicio->exercicio_id}} col-12 d-flex m-0 p-0 d-none">
                            <img class="exercicio-imagem" src="{{asset('storage/'.$exercicio->exercicios->imagem)}}">
                        </div>
                        <div class="row my-2 click_{{$exercicio->exercicio_id}} d-none ">
                            <div class="col-4">
                                <label for="serie" class="text-white fw-bolder">Série:</label>
                                <div class="input-group">
                                    <input value="{{$exercicio->serie}}" type="text" class="disabled form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="repeticoes" class="text-white fw-bolder">Repetições:</label>
                                <div class="input-group">
                                    <input value="{{$exercicio->repeticoes}}" type="text" class="disabled form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="carga" class="text-white fw-bolder">Carga:</label>
                                <div class="input-group">
                                    <input value="{{$exercicio->carga}} (Kg)" type="text" class="disabled form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-white">No momento não tem exercicios</p>
                @endforelse
            </ul>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('.mostrar_imagem').on('click', function(){
            var id = $(this).attr('id');
            var exercicio_imagem = $('.click_'+id);
            $(exercicio_imagem).toggleClass('d-none');
        });
    </script>
@endsection