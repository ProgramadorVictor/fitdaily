@extends('template.back')
@section('titulo', 'Administração')
@section('body')
    <style>
        html body{
            background-color: #3E3939 !important;
        }
    </style>
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-4 my-5">
            <ul class="col-12 p-0 list-unstyled background-black d-flex justify-content-center flex-wrap">
                @foreach($menus as $menu)
                    <li class="col-12 d-block text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                        <a href="{{$menu['route']}}" class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end">
                            <p class="d-flex justify-content-start col-12 m-0 ps-2">{{$menu['nome']}}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
@section('script')
@endsection