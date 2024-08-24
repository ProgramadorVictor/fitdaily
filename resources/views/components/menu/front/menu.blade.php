<style>
    @media (min-width: 1024px) {
        .offcanvas, #menu {
            display: none;
        }
    }
    @media (max-width: 1023px) {
        .navbar {
            display: none;
        }
        .offcanvas{
            max-width: 85%;
        }
    }
</style>
    <nav class="navbar navbar-expand-lg background-black">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto gap-4">
                    <li class="nav-item ">
                        <a class="nav-link active fw-bolder text-white background-red btn-border border border-2 border-dark" href="{{route('tela-principal')}}">CHAT</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active fw-bolder text-white background-red btn-border border border-2 border-dark" href="{{route('usuario.perfil')}}">PERFIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-white background-red btn-border border border-2 border-dark" href="{{route('financeiro-pagamento.planos')}}">PLANOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-white background-red btn-border border border-2 border-dark" href="{{route('financeiro-pagamento.extratos')}}">EXTRATOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-white background-red btn-border border border-2 border-dark" href="{{route('usuario.treinos')}}">TREINOS</a>
                    </li>
                    @if(session('usuario')['tipo_id'] == 2)
                        <li class="nav-item">
                            <a class="nav-link fw-bolder text-white background-red btn-border border border-2 border-dark" href="{{route('alunos-treinos.index')}}">ALUNOS E TREINOS</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-white background-red btn-border border border-2 border-dark" href="{{route('login.logout')}}">SAIR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
{{-- Menu acima é para computador --}}
{{-- Menu abaixo é para celular --}}
<div class="col-12 d-flex justify-content-end px-2 background-black">
    <button id="menu" type="button" class="btn border-0 p-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <span class="fa fa-bars fa-2x text-white"></span>
    </button>
    <div class="offcanvas offcanvas-end background-black" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header p-2 d-block">
            <div class="d-flex justify-content-center">
                <a href="{{route('usuario.perfil')}}" id="perfil" class="border-0 p-0 background-red d-flex justify-content-center icon-foto">
                    @if(isset(session('usuario')['imagem']) && session('usuario')['imagem'] != '')
                        <img id="foto-perfil" src="{{ asset('storage/'.session('usuario')['imagem']) }}" class="icon-foto disable">
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
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('tela-principal')}}">
                        <p class="col-11 m-0 text-center">CHAT</p>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('usuario.perfil')}}">
                        <p class="col-11 m-0 text-center">PERFIL</p>
                        <i class="fa fa-user text-white" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('financeiro-pagamento.planos')}}">
                        <p class="col-11 m-0">PLANOS</p>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('financeiro-pagamento.extratos')}}">
                        <p class="col-11 m-0">EXTRATOS</p>
                    </a>
                </li>
                <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('usuario.treinos')}}">
                        <p class="col-11 m-0">TREINOS</p>
                    </a>
                </li>
                @if(session('usuario')['tipo_id'] == 2)
                    <li class="col-12 text-center border border-2 border-dark mb-3 p-1 background-red btn-border">
                        <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('alunos-treinos.index')}}">
                            <p class="col-11 m-0">ALUNOS E TREINOS</p>
                            <i class="fa fa-id-card text-white" aria-hidden="true"></i>
                        </a>
                    </li>
                @endif
            </ul>
            <ul class="p-0 list-unstyled background-black d-flex justify-content-end">
                <li class="col-3 border text-center border-2 border-dark mb-3 p-1 background-red fw-bolder btn-border">
                    <a href="{{route('login.logout')}}" class="text-white text-decoration-none"><p class="col-12 m-0">SAIR</p></a>
                </li>
            </ul>
        </div>
    </div>
</div>
