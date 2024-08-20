@extends('template.back')
@section('titulo', 'Adicionar Exercicio')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            @component('admin.exercicios.form.form_adicionar_editar', ['tipos' => $tipos])
            @endcomponent
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('button.exercicio-imagem').on('click', function(){
            $('input[name="imagem"]').trigger('click');
        });
        $('input[name="imagem"]').on('change', function(event) {
            var arquivo = event.target.files[0];
            if (arquivo) {
                var url = URL.createObjectURL(arquivo);
                $('.exercicio-imagem').attr('src', url);
                $('.exercicio-imagem').removeClass('d-none');
            }
        });
    </script>
@endsection