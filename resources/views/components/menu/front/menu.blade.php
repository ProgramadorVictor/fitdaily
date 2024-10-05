<nav class="navbar navbar-expand-lg bg-custom-black">
    <div class="container-fluid justify-content-end">
        <button class="navbar-toggler bg-custom-red" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-4">
                @foreach($opcoes as $opcao)
                    <li class="nav-item">
                        <a class="nav-link active fw-bolder text-white" href="{{route($opcao['route'])}}">{{$opcao['nome']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
