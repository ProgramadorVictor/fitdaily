@extends('template.front')
@section('titulo', 'Perfil')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div id="carouselExampleInterval" class="carousel slide my-5 mx-5 col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4" data-bs-ride="carousel">
            <div class="carousel-inner border border-3 border-black">
                @foreach($assinaturas as $key => $assinatura)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}" data-bs-interval="2000">
                        <form action="{{ route('financeiro-pagamento.realizar-pagamento') }}" method="post">
                            @csrf
                            <input type="hidden" name="assinatura" value="{{$assinatura->id}}">
                            <div class="text-white text-center fw-bolder fs-4 background-black">
                                {{$assinatura->nome}}
                            </div>
                            <p class="fs-1 text-white text-center">
                                R$ {{$assinatura->valor}}
                            </p>
                            <div>
                                <ul class="text-white fs-5 list-unstyled m-5 text-center">
                                    <li>Acesso Total à Academia</li>
                                    <hr class="my-1">
                                    <li>{{$assinatura->descricao}}</li>
                                    <hr class="my-1">
                                    @if ($assinatura->desconto)
                                        <li>R$ {{$assinaturas[0]->valor}} x {{$assinatura->duracao}} com desconto de {{$assinatura->desconto}}%</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="submit" class="btn background-black text-white text-center border-2 border-dark fw-bolder">JUNTE-SE A NÓS</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Voltar</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>  
    </section>
@endsection
@section('script')
@endsection