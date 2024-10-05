@if(isset($exercicio->id))
    <form method="post" action="{{route('exercicio.update', ['exercicio' => $exercicio])}}" enctype="multipart/form-data"  autocomplete="off">
        @csrf
        @method('put')
@else
    <form method="post" action="{{route('exercicio.store')}}" enctype="multipart/form-data"  autocomplete="off">
        @csrf
@endif
    <input name="imagem" type="file" class="display-none">
    <p class="text-white fw-bolder">Nome do Exercicio:</p>
    <div class="input-group flex-nowrap my-2">
        <input value="{{$exercicio->nome ?? old('nome')}}" name="nome" type="text" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark" placeholder="Nome do Exercicio" aria-describedby="addon-wrapping">
    </div>
    <p class="text-white fw-bolder">Tipo do Exercicio:</p>
    <div class="input-group flex-nowrap my-2">
        <select name="tipo" class="form-select fw-bolder border-0" style="border-radius: 0;">
            <option disabled selected class="fw-bold">Selecione o tipo do exercicio</option>

            @foreach($tipos as $tipo)
                <option class="fw-bold" value="{{$tipo['id']}}" {{($exercicio->tipo_id ?? old('tipo')) == $tipo['id'] ? 'selected': ''}} >{{$tipo['nome']}}</option>
            @endforeach
        </select>
    </div>
    <div class="d-block col-12">
        <div class="col-12 d-flex justify-content-center">
            <button type="button" class="btn border-0 p-0 background-red d-flex justify-content-center exercicio-imagem align-items-center">
                <img id="exercicio-imagem" src="{{isset($exercicio->imagem) ? asset('storage/'.$exercicio->imagem) : ''}}" class="exercicio-imagem {{ empty($exercicio->imagem) ? 'd-none' : '' }}">
            </button>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">{{isset($exercicio->id) ? 'Editar' : 'Adicionar'}}</button>
    </div>
</form>