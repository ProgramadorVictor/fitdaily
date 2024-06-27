<div class="col-12 d-flex justify-content-end px-2 background-black">
    <button type="button" class="btn border-0 p-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <span class="fa fa-bars fa-2x text-white"></span>
    </button>
    <div class="offcanvas offcanvas-end background-black" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header p-2 d-block">
            <div class="d-flex justify-content-center">
                <a href="{{route('perfil')}}" id="perfil" class="border-0 p-0 background-red d-flex justify-content-center icon-foto">
                    @if(isset(session('usuario')['perfil_foto']) && session('usuario')['perfil_foto'] != '')
                        <img id="foto-perfil" src="{{ asset('storage/'.session('usuario')['perfil_foto']) }}" class="icon-foto disable">
                    @else
                        <i id="foto-padrao" class="fa fa-user fa-3x text-white d-flex align-items-center disable" aria-hidden="true"></i>
                    @endif
                </a>
            </div>
            <div class="col-12 text-center">
                <p class="text-white d-block"> Olá, Como vai?</p>
                <p class="text-white d-block fw-bolder">{{session('usuario')['nome'].' '.session('usuario')['sobrenome']}}</p>
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
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('financeiro')}}" >
                        <p class="col-11 m-0">FINANCEIRO</p>
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
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
                @if(session('usuario')['tipo'] == 2)
                    <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                        <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="../../instrutor/index.html">
                            <p class="col-11 m-0">ALUNOS E TREINOS</p>
                            <i class="fa fa-id-card text-white" aria-hidden="true"></i>
                        </a>
                    </li>
                @endif
            </ul>
            <ul class="p-0 list-unstyled background-black d-flex justify-content-end">
                <li class="col-3 border text-center border-2 border-dark mb-3 p-1 background-red fw-bolder btn-border">
                    <a href="{{route('logout')}}" class="text-white text-decoration-none"><p class="col-12 m-0">SAIR</p></a>
                </li>
            </ul>
        </div>
    </div>
</div>