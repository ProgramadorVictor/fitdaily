<div class="col-12 d-flex justify-content-end px-2 background-black">
    {{-- <button  class="btn border-0" type="button">
        <i class="fa fa-envelope fa-2x text-white" aria-hidden="true"></i>
    </button> --}}
    <button class="btn border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="fa fa-bars fa-2x text-white"></i>
    </button>
    <div class="offcanvas offcanvas-end background-black" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header p-2 d-block">
            <div class="d-flex justify-content-center">
                <div class="border border-2 border-dark col-3 p-4 background-red d-flex justify-content-center icon-foto">
                    <i class="fa fa-user fa-2x text-white" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-12 text-center">
                <p class="text-white d-block"> Olá, Como vai?</p>
                <p class="text-white d-block fw-bolder">{{$sessao['nome'].' '.$sessao['sobrenome']}}</p>
            </div>
        </div>
        <div class="offcanvas-body">
            <ul class="p-0 list-unstyled background-black">
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('perfil')}}">
                        <p class="col-11 m-0 text-center">PERFIL</p>
                        <i class="fa fa-user text-white" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="../../financeiro/index.html" >
                        <p class="col-11 m-0">FINANCEIRO</p>
                        <i class="fa fa-user text-white" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="../../calendario/index.html">
                        <p class="col-11 m-0">AGENDA</p>
                        <i class="fa fa-calendar text-white" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="../../treinos/index.html">
                        <p class="col-11 m-0">TREINOS</p>
                        <i class="fa fa-id-card text-white" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="../../instrutor/index.html">
                        <p class="col-11 m-0">ALUNOS E TREINOS (INSTRUTOR)</p>
                        <i class="fa fa-id-card text-white" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
            <ul class="p-0 list-unstyled background-black d-flex justify-content-end">
                <li class="col-3 border text-center border-2 border-dark mb-3 p-1 background-red fw-bolder btn-border">
                    <a href="{{route('logout')}}" class="text-white text-decoration-none"><p class="col-12 m-0">SAIR</p></a>
                </li>
            </ul>
        </div>
    </div>
</div>