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
<nav class="navbar navbar-expand-lg bg-custom-black">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto gap-4">
                <li class="nav-item ">
                    <a class="nav-link active fw-bolder text-white bg-custom-black btn-border" href="{{route('tela-principal')}}">Chat</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active fw-bolder text-white bg-custom-black btn-border" href="{{route('usuario.perfil')}}">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white bg-custom-black btn-border" href="{{route('financeiro-pagamento.planos')}}">Planos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white bg-custom-black btn-border" href="{{route('financeiro-pagamento.extratos')}}">Extratos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white bg-custom-black btn-border" href="{{route('usuario.treinos')}}">Treinos</a>
                </li>
                {{-- @if(session('usuario')['tipo_id'] == 2)
                    <li class="nav-item">
                        <a class="nav-link fw-bolder text-white bg-custom-black btn-border border border-2 border-dark" href="{{route('alunos-treinos.index')}}">ALUNOS E TREINOS</a>
                    </li>
                @endif --}}
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white bg-custom-black btn-border" href="{{route('login.logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-12 d-flex justify-content-end px-2 bg-custom-black">
    <button id="menu" type="button" class="btn border-0 p-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <span class="fa fa-bars fa-2x text-white"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-custom-black" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header p-2 d-block">
            <div class="d-flex justify-content-center">
                <a href="{{route('usuario.perfil')}}" id="perfil" class="border-0 p-0 bg-custom-red d-flex justify-content-center icon-foto">
                    @if(isset(session('usuario')['imagem']) && session('usuario')['imagem'] != '')
                        <img id="foto-perfil" src="{{ asset('storage/'.session('usuario')['imagem']) }}" class="icon-foto disable">
                    @else
                        <i id="foto-padrao" class="fa fa-user fa-3x text-white d-flex align-items-center disable" aria-hidden="true"></i>
                    @endif
                </a>
            </div>
            <div class="col-12 text-center">
                <p class="text-white d-block"> Olá, Como vai?</p>
                {{-- <p class="text-white d-block fw-bolder">{{session('usuario')['nome'].' '.session('usuario')['sobrenome']}}</p> --}}
            </div>
        </div>
        <div class="offcanvas-body">
            <ul class="p-0 list-unstyled d-flex flex-column gap-3">
                <li class="col-12 btn btn-primary border-2 border-dark bg-custom-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder text-center" href="{{route('tela-principal')}}">
                        Chat
                    </a>        
                </li>
                <li class="col-12 btn btn-primary border-2 border-dark bg-custom-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder text-center" href="{{route('usuario.perfil')}}">
                        Perfil
                    </a>
                </li>
                <li class="col-12 btn btn-primary border-2 border-dark bg-custom-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder text-center" href="{{route('financeiro-pagamento.planos')}}">
                        Planos
                    </a>
                </li>
                <li class="col-12 btn btn-primary border-2 border-dark bg-custom-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder text-center" href="{{route('financeiro-pagamento.extratos')}}">
                        Extratos
                    </a>
                </li>
                <li class="col-12 btn btn-primary border-2 border-dark bg-custom-red btn-border">
                    <a class="text-white text-decoration-none fw-bolder text-center" href="{{route('usuario.treinos')}}">
                        Treinos
                    </a>
                </li>
                {{-- @if(session('usuario')['tipo_id'] == 2)
                    <li class="col-12 btn btn-primary border-2 border-dark bg-custom-red btn-border mb-3">
                        <a class="text-white text-decoration-none fw-bolder d-flex align-items-center justify-content-end" href="{{route('alunos-treinos.index')}}">
                            <p class="col-11 m-0">ALUNOS E TREINOS</p>
                        </a>
                    </li>
                @endif --}}
            </ul>
            <ul class="p-0 list-unstyled background-black d-flex justify-content-end">
                <li class="col-3 btn btn-primary border-2 border-dark bg-custom-red fw-bolder btn-border mb-3">
                    <a href="{{route('login.logout')}}" class="text-white text-decoration-none">
                        <p class="col-12 m-0">Logout</p>
                    </a>
                </li>
            </ul>
            
        </div>
    </div>
</div>
