@extends('template.front')
@section('titulo', 'Perfil')
@section('body')
    <div class="background-black px-2">
        <a href="{{route('tela-principal')}}" class="text-decoration-none text-white"> <i class="fa fa-home" aria-hidden="true"></i> Tela Principal</a>
        <a href="{{route('financeiro')}}" class="text-decoration-none text-white">| <i class="fa fa-credit-card" aria-hidden="true"></i> Financeiro</a>
    </div>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
            @if ($extratos->isEmpty())
                <p class="text-white text-center">Você não tem nenhum extrato ainda.</p>
            @else
                @foreach($extratos as $extrato)
                    <div class="col-12 card my-2 background-black">
                        <h3 class="ms-2 mt-2"><span class="badge text-bg-success">{{$extrato->pagamento->status_de_pagamento == "approved" ? "Aprovado" : ""}}</span></h3>
                        <div class="card-body">
                            <h5 class="card-title fw-bolder text-white">{{$extrato->assinatura->assinatura}}</h5>
                            <hr class="col-12 text-white">

                            <p class="card-text mb-2 text-white d-flex justify-content-between">Vencimento: <span>{{$extrato->data_vencimento}}</span></p>
                            <p class="card-text mb-2 text-white d-flex justify-content-between">Pago Em: <span>{{$extrato->data_pagamento}}</span></p>

                            <hr class="col-12 text-white">
                            <h6 class="text-white">R$: <span> {{$extrato->assinatura->valor}} </span></h6>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
@section('script')
@endsection