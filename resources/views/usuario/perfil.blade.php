@extends('template.front')
@section('titulo', 'Perfil')
@section('body')
    @push('style')
        <style>
            html body{
                background-color: #3E3939 !important;
            }
            @media (min-width: 1024px) {
                #foto-div{
                    width: 40%;
                }
                .foto{
                    width: 20rem;
                    height: 20rem;
                    border-radius: 50%;
                }
            }
            @media (max-width: 1023px) {
                #foto-div {
                    width: 100% !important;
                }
                section > div > div.col-6.d-flex.justify-content-center.align-items-center{
                    width: 100%;
                }
            }
        </style>
    @endpush
    <section class="col-12">
        <div id="foto-div m-auto">
            <div class="col-12 text-center">
                <button type="button" class="btn bg-custom-red foto">
                    @if($imagem != null)
                        <img id="foto-perfil" src="{{ asset('storage/'. session('usuario')['imagem'])}}" class="foto disable">
                    @else
                        <i id="foto-padrao" class="fa fa-user fa-3x text-white disable" aria-hidden="true"></i>
                    @endif
                </button>
            </div>
            <p class="text-center text-white">
                Olá, Como vai? <br> {{auth()->user()->nome_completo}}
            </p>
        </div>
        <div class="col-12 px-2">
            @component('usuario.form.form')
            @endcomponent
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var campo_email = true;
            ativaCampo = () => {
                $('input[name="email"]').removeClass('disabled');
                $('#unlock').removeClass('d-none');
                $('#lock').addClass('d-none');
            }
            $('input[name="email"]').on('click', function(){
                if(campo_email){
                    $('#avisoEmail').removeClass('d-none');
                    $('input[name="email"]').addClass('disabled');
                    $('#lock').removeClass('d-none');
                    campo_email = false;
                }
            });
            $('button.icon-foto').on('click', function(){
                $('input[name="imagem"]').trigger('click');
            });
            $('input[name="imagem"]').on('change', function(event) {
                var arquivo = event.target.files[0];
                if (arquivo) {
                    var url = URL.createObjectURL(arquivo);
                    if ($('#foto-perfil').length) {
                        $('button .icon-foto').attr('src', url);
                        $('div .icon-foto').attr('src', url);
                    } else {
                        $('.icon-foto').html('<img id="foto-perfil" src="' + url + '" class="icon-foto">');
                    }
                }
            });
        });
    </script>
@endsection