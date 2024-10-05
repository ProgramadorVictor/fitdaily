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
            @component('admin.exercicios.form.form_adicionar_editar', ['tipos' => $tipos, 'exercicio' => $exercicio])
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
                $('#teste').attr('src', url);
                
                // alert( $('.exercicio-imagem').attr('src', url));
                // if ($('#foto-perfil').length) {
                //     $('button  .exercicio-imagem').attr('src', url);
                //     $('#teste').attr('src', url);
                // }
                // else {
                //     $('.icon-foto').html('<img id="foto-perfil" src="' + url + '" class="icon-foto">');
                // }
            }
        });
    </script>
@endsection