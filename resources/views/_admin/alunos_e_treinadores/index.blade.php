@extends('template.back')
@section('titulo', 'Alunos e Treinadores')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <div class="mini-screen">
                <ul class="col-12 p-0 list-unstyled background-black d-flex justify-content-center flex-wrap ">
                    @forelse($usuarios as $usuario)
                        <li class="col-12 d-block text-center mb-0 background-red mb-3">
                            <a href="#" id="{{$usuario->id}}" class="link p-1 text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end">
                                <p class="d-flex justify-content-center col-12 m-0 ps-2">{{$usuario->nome.' '.$usuario->sobrenome}} - {{$usuario->tipo_id == 1 ? 'Aluno' : 'Treinador'}}</p>
                            </a>
                            <div id="div_{{$usuario->id}}" class="d-none">
                                <form  method="post" action="{{route('admin.alterar-tipo')}}"class="col-12 d-flex justify-content-around p-2">
                                    @csrf
                                    @method('patch')
                                    <div class="col-3">
                                        <input type="hidden" name="id" value="{{$usuario->id}}">
                                        <select name="tipo" class="form-select border-radius-none col-4">
                                            @foreach($tipos as $tipo)
                                                <option value="{{$tipo->id}}" {{$usuario->tipo_id == $tipo->id ? 'selected' : ''}}>{{$tipo->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="col-12 btn btn-success border-radius-none">Atualizar</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        @empty
                            <p class="text-white">No momento não tem usuarios</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('.link').on('click', function(){
            var usuario = $(this);
            $('#div_'+usuario.attr('id')).toggleClass('d-none');
        });
    
        // $('form').on('submit', function(e){
        //     e.preventDefault();
        //     var id = $(this).find('input[name="id"]').val();
        //     var tipo_id = $(this).find('select[name="tipo"]').val();
        //     $.ajax({
        //         url: '/admin/alterar-tipo-usuario',
        //         type: 'POST',
        //         headers:
        //         {
        //             'X-CSRF-TOKEN': '{{csrf_token()}}'
        //         },
        //         contentType: 'application/x-www-form-urlencoded',
        //         data: 
        //         {     
        //             id: id,
        //             tipo_id: tipo_id,
        //         },
        //         success: function(response) {
        //             console.log("correto");
        //         },
        //         error: function(error) {
        //             console.error('Falha ao enviar:', error);
        //         }
        //     });
        // });
    </script>
@endsection