@extends('template.front')
@section('titulo', 'Exercicios de ' . $aluno->nome . ' ' . $aluno->sobrenome)
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <ul class="col-12 list-unstyled background-black d-flex justify-content-center flex-wrap">
                @forelse($exercicios_do_aluno as $exercicio)
                    <div class="col-12 mb-4">
                        <div class="col-12 d-flex">
                            <a id="{{$exercicio->exercicios->id}}" class="d-flex mostrar_imagem col-11 text-center m-0 background-red text-decoration-none" href="#">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i id="icoDown" class="fa fa-1x fa-caret-down text-white" aria-hidden="true"></i>
                                    <i id="icoUp" class="fa fa-1x fa-caret-up d-none" aria-hidden="true"></i>
                                </div>
                                <li class="h-100 align-items-center d-flex justify-content-center col-12 m-0 text-white fw-bolder">
                                    {{ $exercicio->exercicios->nome }}
                                </li>
                            </a>
                            <form class="col-1" method="post" action="{{route('alunos-treinos.apagar-exercicio', ['treinoexercicio' => $exercicio])}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger border-radius-none col-12 text-decoration-none d-flex justify-content-center text-white p-2">
                                    <i class="fa fa-1x fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-12 d-flex m-0 p-0 mb-4">
                            <img class="click_{{$exercicio->exercicios->id}} d-none exercicio-imagem" src="{{isset($exercicio->exercicios->imagem) ? asset('storage/'.$exercicio->exercicios->imagem) : ''}}" >
                        </div>
                        <div class="row my-2 click_{{$exercicio->exercicios->id}} d-none">
                            <div class="col-4">
                                <label for="serie" class="text-white fw-bolder">Série:</label>
                                <div class="input-group">
                                    <input name="serie" value="{{$exercicio->serie}}" placeholder="Séries" type="text" class="disabled form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="repeticoes" class="text-white fw-bolder">Repetições:</label>
                                <div class="input-group">
                                    <input name="repeticoes" value="{{$exercicio->repeticoes}}" placeholder="Repetições" type="text" class="disabled form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="carga" class="text-white fw-bolder">Carga:</label>
                                <div class="input-group">
                                    <input name="carga" value="{{$exercicio->carga}}" placeholder="Carga (Kg)" type="text" class="disabled form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-white">No momento não tem exercicios</p>
                @endforelse
            </ul>
            @component('alunos_treinos.form.adicionar', ['treino' => $treino, 'tipos' => $tipos])
            @endcomponent
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('.mostrar_imagem').on('click', function(){
            var id = $(this).attr('id');
            alert(id);
            var exercicio_imagem = $('.click_'+id);
            console.log(exercicio_imagem);
            $(exercicio_imagem).toggleClass('d-none');
        });
        $('#abrirFormulario').on('click', function(){
            $('#mostrarFormulario').toggleClass('d-none');
        });
        $(document).ready(function() {
            if($('select[name="tipo"]').val()){
                if($('select[name="tipo"]').val() != null){
                    trazerExercicios();
                }
            }
            $('select[name="tipo"]').on('change', function() {
                trazerExercicios();
            });
            function trazerExercicios(){
                var tipo = $('select[name="tipo"]').val();
                $('#exercicio-imagem').attr('src', null);
                $.ajax({
                    url: '/home/alunos-treinos/aluno/treino/exercicios/' + tipo,
                    type: 'GET',
                    success: function(data) {
                        var exercicios = $('select[name="exercicio"]');
                        exercicios.empty();
                        exercicios.append('<option disabled selected class="fw-bold">Nome do Exercicio</option>');
                        $.each(data, function(index, exercicio) {
                            exercicios.append('<option class="fw-bold" value="' + exercicio.id + '">' + exercicio.nome + '</option>');
                        });
                    },
                    error: function(e) {
                        console.error("Erro ao buscar os exercícios: ", e);
                    }
                });
            }
            $('select[name="exercicio"]').on('change', function() {
                var id = $(this).val();
                $.ajax({
                    url: '/home/alunos-treinos/aluno/treino/exercicios/imagem/' + id,
                    type: 'GET',
                    success: function(data) {
                        var imagem = '/storage/' + data.imagem;
                        $('#exercicio-imagem').attr('src', imagem);
                    },
                    error: function(e) {
                        console.error("Erro ao buscar os exercícios: ", e);
                    }
                });
            });
        });
    </script>
@endsection

