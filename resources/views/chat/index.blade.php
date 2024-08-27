@extends('template.chat')
@section('titulo', 'Chat')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-3 d-flex justify-content-center my-2 mini-screen">
            <ul id="mensagens" class="col-12 list-unstyled">
                @foreach($mensagens as $mensagem)
                    <li class="mensagem mb-2">
                        <div class="col-12 background-black btn-border">
                            <img class="chat-icone border border-2 border-dark mt-1 ms-1" src="{{asset( ($mensagem->usuario->imagens->imagem ? 'storage/'. $mensagem->usuario->imagens->imagem : 'logo.png') )}}" alt="">
                            <strong class="text-white fw-bolder">{{ $mensagem->usuario->nome }} {{$mensagem->usuario->sobrenome}} - {{$mensagem->usuario->tipo_id == 1 ? 'Aluno' : 'Treinador'}}</strong><br>
                            <span class="text-white ps-5" style="word-break: break-all;" >{{ $mensagem->conteudo }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        const pusher = new Pusher('e203651c86d256fa6f76', {
            cluster: 'sa1',
            encrypted: true
        });
        const channel = pusher.subscribe('chat-channel');
        channel.bind('enviar-mensagem', function(dados) {
            $.get('/obter-ip', function(data) {
                const ip = data.ip;
                $('form > button[type="submit"]').on('click',function(){
                    $(this).removeClass('disabled');
                });
                var usuario = dados.usuario;
                var mensagem = dados.mensagem;
                var imagem = dados.imagem;
                $('.mensagem').each(function(contador) {
                    if(contador == 13){
                        $('.mensagem').first().remove()
                        $(document).scrollTop($(document).height());
                    }
                });
                if (mensagem) {
                    var imagem_existe = (imagem.imagem != null) ? imagem.imagem : 'logo.png';
                    var src = (imagem_existe != 'logo.png')
                            ? 'http://'+ip+':8000/storage/'+imagem_existe
                            : 'http://'+ip+':8000/'+imagem_existe;
                    var html = '<li class="mensagem mb-2">' +
                        '<div class="col-12 background-black btn-border">' +
                        '<img class="chat-icone border border-2 border-dark mt-1 ms-1" src="' + src + '" alt="">' +
                        '<strong class="text-white fw-bolder ps-1" style="word-break: break-all">' + usuario.nome + ' ' + usuario.sobrenome + ' - ' + (usuario.tipo_id == 1 ? "Aluno" : "Treinador") + ':</strong><br>' +
                        '<span class="text-white ps-5">' + mensagem + '</span>' +
                        '</div>' +
                        '</li>';
                    //Não fui eu que fiz, estudar isso aqui!
                    // var html = '<li class="mensagem mb-2">' +
                    //     '<div class="col-12 background-black">';
                    // if (imagem_existe != 'logo.png') {
                    //     html += '<img class="chat-icone border border-2 border-dark" src="http://' + ip + ':8000/storage/' + imagem_existe + '" alt="">';
                    // } else {
                    //     html += '<img class="chat-icone border border-2 border-dark" src="http://' + ip + ':8000/'+ imagem_existe +'"';
                    // }
                    // html += '<strong class="text-white fw-bolder">' + usuario.nome + ' ' + usuario.sobrenome + ':</strong><br>' +
                    //         '<span class="text-white ps-5">' + mensagem + '</span>' +
                    //         '</div>' +
                    //         '</li>';
                    $('#mensagens').append(html);
                }

            });
        });
        $('form').on('submit', function(e) {
            e.preventDefault();
            const mensagem = $('#txtMensagem').val();
            const botao = $('form > button[type="submit"]');
            botao.addClass('disabled');
            $.ajax({
                url: '/home/enviar-mensagem',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                contentType: 'application/x-www-form-urlencoded',
                data: { mensagem: mensagem },
                success: function() {
                    $('#txtMensagem').val('');
                    botao.removeClass('disabled');
                },
                error: function(error) {
                    console.error('Falha ao enviar mensagem:', error);
                    botao.removeClass('disabled');
                }
            });
        });
    });
</script>
@endsection