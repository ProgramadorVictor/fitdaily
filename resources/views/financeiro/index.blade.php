@extends('template.front')
@section('tittle', 'Perfil')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <div class="background-black my-2 ps-2">
        <a href="{{route('tela-principal')}}" class="text-decoration-none text-white"><i class="fa fa-home" aria-hidden="true"></i> Tela Principal</a>
    </div>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <ul class="col-12 p-0 list-unstyled background-black d-flex justify-content-center flex-wrap">
                <li class="col-12 d-block text-center border border-2 border-dark mb-3 p-1 background-red btn-border" >
                    <a href="{{route('extratos')}}" class="text-white text-decoration-none fw-bolder">
                        <p class="col-12 m-0">EXTRATOS</p>
                    </a>
                </li>
                <li class="col-12 d-block text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a href="{{route('planos')}}" class="text-white text-decoration-none fw-bolder">
                        <p class="col-12 m-0">PLANOS</p>
                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
@section('script')
@endsection