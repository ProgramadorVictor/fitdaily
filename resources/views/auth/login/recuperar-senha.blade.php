@extends('template.auth')
@section('titulo', 'Recuperar Senha')
@section('body')
    <section class="col-12 d-flex justify-content-center px-2 px-md-0">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6 col-xxl-3 d-flex justify-content-center my-5 py-3 px-0 mx-2 border border-1 border-dark flex-wrap background-black">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-12 d-flex justify-content-center mb-3">
                    <img src="{{asset('logo.png')}}" style="width:55px; height:55px;">
                </div>
                <div class="text-center text-white fw-bolder">
                    <h4>Recuperação de Senha</h4>
                    <p>Por favor, insira sua nova senha nos campos abaixo e confirme-a.</p>
                </div>
                <div class="col-12 px-2">
                    <form method="post" action="{{route('login.alterar-senha')}}" autocomplete="off">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="token" value="{{request()->get('token')}}">
                        <div class="input-group flex-nowrap mt-3">
                            <input id="senha_1" value="{{ old('senha') }}" name="senha" type="password" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark input-senha" placeholder="Digite sua nova Senha">
                            <span class="p-1 border-dark input-group-text border-none bg-white border-radius-none border border-2 span-senhas" onclick="verSenha()">
                                <i class="fa fa-1x fa-eye senha_1" aria-hidden="true"></i>
                                <i class="fa fa-1x fa-eye-slash d-none senha_1" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="input-group flex-nowrap mt-3">
                            <input id="senha_2" value="{{old('senha_confirmation')}}" name="senha_confirmation" type="password" class="form-control rounded-0 ps-2 fw-bolder border border-2 border-dark input-senha" placeholder="Confirme a Senha">
                            <span class="p-1 border-dark input-group-text border-none bg-white border-radius-none border border-2 span-senhas" onclick="verSenhaConfirmacao()">
                                <i class="fa fa-1x fa-eye senha_2" aria-hidden="true"></i>
                                <i class="fa fa-1x fa-eye-slash d-none senha_2" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="col-12 btn btn-primary border-2 border-dark background-red btn-border">Alterar Senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
