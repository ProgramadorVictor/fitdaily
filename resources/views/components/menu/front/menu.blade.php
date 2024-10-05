<nav class="navbar navbar-expand-lg bg-custom-black">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-4">
                <li class="nav-item">
                    <a class="nav-link active fw-bolder text-white" href="{{route('tela-principal')}}">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bolder text-white" href="{{route('usuario.perfil')}}">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white" href="{{route('financeiro-pagamento.planos')}}">Planos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white" href="{{route('financeiro-pagamento.extratos')}}">Extratos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white" href="{{route('usuario.treinos')}}">Treinos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-white" href="{{route('login.logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
