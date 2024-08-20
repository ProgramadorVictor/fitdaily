@extends('template.front')
@section('titulo', 'Perfil')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4">
            @forelse($extratos as $extrato)
                <div class="col-12 card my-2 background-black">
                    <h3 class="ms-2 mt-2"><span class="badge text-bg-success">{{$extrato->pagamento->assinatura->descricao}}</span></h3>
                    <div class="card-body">
                        <h5 class="card-title fw-bolder text-white"></h5>
                        <hr class="col-12 text-white">

                        <p class="card-text mb-2 text-white d-flex justify-content-between">Vencimento: <span>{{$extrato->data_vencimento->format('d/m/Y H:m:i')}}</span></p>
                        <p class="card-text mb-2 text-white d-flex justify-content-between">Pago Em: <span>{{$extrato->data_pagamento->format('d/m/Y H:m:i')}}</span></p>

                        <hr class="col-12 text-white">
                        <h6 class="text-white">R$: <span> {{$extrato->pagamento->assinatura->valor}} </span></h6>
                    </div>
                </div>
                @empty
                    <p class="text-white text-center">Você não tem nenhum extrato ainda.</p>
            @endforelse
        </div>
    </section>
    <div class="d-flex justify-content-center my-2">
        {{$extratos->links()}}
    </div>
@endsection
@section('script')
@endsection