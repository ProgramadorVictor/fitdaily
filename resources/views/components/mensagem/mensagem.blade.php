@if($errors->any())
    <span class="alert alert-danger show alert-dismissible fade" role="alert">
        @foreach($errors->all() as $error)
            <p class="fw-bolder p-0 m-0">{{$error}}</p>
            @break
        @endforeach
    </span>
@elseif(session('alert'))
    <span class="alert {{ session('alert')['classe'] }} alert-dismissible fade" role="alert">
        <p class="fw-bolder p-0 m-0">{{ session('alert')['mensagem'] }}</p>
    </span>
@endif