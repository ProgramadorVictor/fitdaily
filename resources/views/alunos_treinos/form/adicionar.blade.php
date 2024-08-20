<a id="abrirFormulario"class="col-12 btn btn-success border-0 text-white fw-bolder border-radius-none mt-3" href="#">
    <i class="fa fa-plus" aria-hidden="true"></i>
</a>
<div id="mostrarFormulario" class="d-none">
    <form method="post" action="{{route('alunos-treinos.salvar-exercicio')}}" enctype="multipart/form-data"  autocomplete="off">
        @csrf
        <input type="hidden" name="treino" value="{{$treino->id}}">
        <input name="imagem" type="file" class="display-none">
        <p class="text-white fw-bolder">Tipo do Exercicio:</p>
        <select name="tipo" class="form-select fw-bolder border-0" style="border-radius: 0;">
            <option disabled selected class="fw-bold">Tipo do Exercicio</option>
            @foreach($tipos as $tipo)
                <option class="fw-bold" value="{{$tipo->id}}" {{(old('tipo') ?? '') == $tipo->id ? 'selected' : ''}}>{{$tipo->nome}}</option>
            @endforeach
        </select>
        <p class="text-white fw-bolder">Nome do Exercicio:</p>
        <div class="input-group flex-nowrap my-2">
            <select name="exercicio" class="form-select fw-bolder border-0" style="border-radius: 0;">
                <option disabled selected class="fw-bold">Nome do Exercicio</option>
            </select>
        </div>
        <div class="row my-2">
            <div class="col-4">
                <label for="serie" class="text-white fw-bolder">Série:</label>
                <div class="input-group">
                    <input name="serie" value="{{old('serie')}}" placeholder="Séries" type="text" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                </div>
            </div>
            <div class="col-4">
                <label for="repeticoes" class="text-white fw-bolder">Repetições:</label>
                <div class="input-group">
                    <input name="repeticoes" value="{{old('repeticoes')}}" placeholder="Repetições" type="text" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                </div>
            </div>
            <div class="col-4">
                <label for="carga" class="text-white fw-bolder">Carga:</label>
                <div class="input-group">
                    <input name="carga" value="{{old('carga')}}" placeholder="Carga (Kg)" type="text" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark">
                </div>
            </div>
        </div>
        <div class="d-block col-12">
            <div class="col-12 d-flex justify-content-center">
                <button type="button" class="btn border-0 p-0 background-red d-flex justify-content-center exercicio-imagem align-items-center">
                    <img id="exercicio-imagem" class="exercicio-imagem" src="">
                </button>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border border-radius-none">Adicionar</button>
        </div>
    </form>
</div>