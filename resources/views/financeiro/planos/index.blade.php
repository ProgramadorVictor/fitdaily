@extends('template.front')
@section('titulo', 'Perfil')
@section('body')
    <div class="background-black px-2">
        <a href="{{route('tela-principal')}}" class="text-decoration-none text-white"> <i class="fa fa-home" aria-hidden="true"></i> Tela Principal</a>
        <a href="{{route('financeiro')}}" class="text-decoration-none text-white">| <i class="fa fa-credit-card" aria-hidden="true"></i> Financeiro</a>
    </div>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div id="carouselExampleInterval" class="carousel slide my-5 mx-5 col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4" data-bs-ride="carousel">
            <div class="carousel-inner border border-3 border-black">
                <div class="carousel-item active" data-bs-interval="2000">
                    <form action="{{route('pagamento')}}" method="post">
                        @csrf
                        <input type="hidden" name="Assinatura" value="1">
                        <div class="text-white text-center fw-bolder fs-4 background-black">Mensal</div>
                        <p class="fs-1 text-white text-center">
                            R$ 100,00
                        </p>
                        <div>
                            <ul class="text-white fs-5 list-unstyled m-5 text-center">
                                <li>Assinatura de Um Mês</li>
                                <hr class="my-1">
                                <li>Acesso Total Academia</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn background-black text-white text-center border-2 border-dark fw-bolder">JUNTE-SE A NÓS</button>
                        </div>
                    </form>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <form action="{{route('pagamento')}}" method="post">
                        @csrf
                        <input type="hidden" name="Assinatura" value="2">
                        <div class="text-white text-center fw-bolder fs-4 background-black">Trimestral</div>
                        <p class="fs-1 text-white text-center">
                            R$ 255,00 
                        </p>
                        <div>
                            <ul class="text-white fs-5 list-unstyled m-5 text-center">
                                <li>Assinatura de Três Meses</li>
                                <hr class="my-1">
                                <li>Acesso Total Academia</li>
                                <hr class="my-1">
                                <li>R$ 100,00 x 3 com desconto de 15%</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn background-black text-white text-center border-2 border-dark fw-bolder">JUNTE-SE A NÓS</button>
                        </div>
                    </form>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <form action="{{route('pagamento')}}" method="post">
                        @csrf
                        <input type="hidden" name="Assinatura" value="3">
                        <div class="text-white text-center fw-bolder fs-4 background-black">Anual</div>
                        <p class="fs-1 text-white text-center">
                            R$ 960,00
                        </p>
                        <div>
                            <ul class="text-white fs-5 list-unstyled m-5 text-center">
                                <li>Assinatura de Doze Meses</li>
                                <hr class="my-1">
                                <li>Acesso Total Academia</li>
                                <hr class="my-1">
                                <li>R$ 100,00 x 12 com desconto de 20%</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn background-black text-white text-center border-2 border-dark fw-bolder">JUNTE-SE A NÓS</button>
                        </div>
                    </form>
                </div>
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