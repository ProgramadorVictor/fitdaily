@extends('template.front')
@section('tittle', 'Perfil')
@section('body')
    <div class="background-black my-2 ps-2">
        <a href="{{route('tela-principal')}}" class="text-decoration-none text-white"><i class="fa fa-home" aria-hidden="true"></i> Tela Principal</a>
    </div>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-10">
            <div class="card my-2 background-black">
                <h3 class="ms-2 mt-2"><span class="badge text-bg-success">PAGO</span></h3>
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-white">MENSAL - Abril</h5>
                    <hr class="col-12 text-white">
                    <h6 class="card-text mb-2 text-white d-flex justify-content-between">Vencimento: <span>29/05/2024</span></h6>
                    <p class="card-text mb-2 text-white d-flex justify-content-between">Pago Em: <span>29/04/2024</span></p>
                    <hr class="col-12 text-white">
                    <h6 class="text-white">R$: <span> 60,99</span></h6>
                </div>
            </div>
            <div class="col-12 card my-2 background-black">
                <h3 class="ms-2 mt-2"><span class="badge text-bg-success">PAGO</span></h3>
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-white">MENSAL - Março</h5>
                    <hr class="col-12 text-white">
                    <h6 class="card-text mb-2 text-white d-flex justify-content-between">Vencimento: <span>27/04/2024</span></h6>
                    <p class="card-text mb-2 text-white d-flex justify-content-between">Pago Em: <span>27/03/2024</span></p>
                    <hr class="col-12 text-white">
                    <h6 class="text-white">R$: <span> 60,99</span></h6>
                </div>
            </div>
            <div class="col-12 card my-2 background-black">
                <h3 class="ms-2 mt-2"><span class="badge text-bg-success">PAGO</span></h3>
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-white">MENSAL - Fevereiro</h5>
                    <hr class="col-12 text-white">
                    <h6 class="card-text mb-2 text-white d-flex justify-content-between">Vencimento: <span>27/03/2024</span></h6>
                    <p class="card-text mb-2 text-white d-flex justify-content-between">Pago Em: <span>27/02/2024</span></p>
                    <hr class="col-12 text-white">
                    <h6 class="text-white">R$: <span> 60,99</span></h6>
                </div>
            </div>
            <div class="col-12 card my-2 background-black">
                <h3 class="ms-2 mt-2"><span class="badge text-bg-success">PAGO</span></h3>
                <div class="card-body">
                    <h5 class="card-title fw-bolder text-white">MENSAL - Janeiro</h5>
                    <hr class="col-12 text-white">
                    <h6 class="card-text mb-2 text-white d-flex justify-content-between">Vencimento: <span>27/02/2024</span></h6>
                    <p class="card-text mb-2 text-white d-flex justify-content-between">Pago Em: <span>27/01/2024</span></p>
                    <hr class="col-12 text-white">
                    <h6 class="text-white">R$: <span> 60,99</span></h6>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection