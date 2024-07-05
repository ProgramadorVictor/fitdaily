@extends('template.front')
@section('titulo', 'Principal')
@section('body')
    <section>
        <div class="background-red my-2 ps-2">
            <a href="../tela_inicial/index.html" class="text-decoration-none text-white"><i class="fa fa-home" aria-hidden="true"></i> Tela Principal|</a>
        </div>
            <div class="background-red px-4">
                <div class="col-12">
                    <button class="col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <img width="50" src="../../storage/treinos/agachamento-chute-lateral.gif" class="col-2">
                        <p class="col-10 fw-bolder text-center m-0">TREINO AGACHAMENTO DE CHUTE LATERAL</p>
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body border-dark border-2 background-black p-0 border-radius-none">
                            <div class="d-flex justify-content-center">
                                <img width="250" src="../../storage/treinos/agachamento-chute-lateral.gif">
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Série</th>
                                        <th scope="col">Repetições</th>
                                        <th scope="col">Carga (Kg)</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" value="" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button class="border-0 col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                        <img width="50" src="../../storage/treinos/burpees.gif" class="col-2">
                        <p class="col-10 fw-bolder text-center m-0">TREINO BURPEES </p>
                    </button>
                    <div class="collapse" id="collapseExample2">
                        <div class="card card-body border-dark border-2 background-black p-0 border-radius-none">
                            <div class="d-flex justify-content-center">
                                <img width="250" src="../../storage/treinos/burpees.gif">
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Série</th>
                                        <th scope="col">Repetições</th>
                                        <th scope="col">Carga (Kg)</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" value="" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button class="border-0 col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                        <img width="50" src="../../storage/treinos/flexao-diamante.gif" class="col-2">
                        <p class="col-10 fw-bolder text-center m-0">TREINO FLEXÃO DIAMANTE</p>
                    </button>
                    <div class="collapse" id="collapseExample3">
                        <div class="card card-body border-dark border-2 background-black p-0 border-radius-none">
                            <div class="d-flex justify-content-center">
                                <img width="250" src="../../storage/treinos/flexao-diamante.gif">
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Série</th>
                                        <th scope="col">Repetições</th>
                                        <th scope="col">Carga (Kg)</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" value="" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button class="border-0 col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                        <img width="50" src="../../storage/treinos/halter.gif" class="col-2">
                        <p class="col-10 fw-bolder text-center m-0">TREINO HALTER</p>
                    </button>
                    <div class="collapse" id="collapseExample4">
                        <div class="card card-body border-dark border-2 background-black p-0 border-radius-none">
                            <div class="d-flex justify-content-center">
                                <img width="250" src="../../storage/treinos/halter.gif">
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Série</th>
                                        <th scope="col">Repetições</th>
                                        <th scope="col">Carga (Kg)</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" value="" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button class="border-0 col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                        <img width="50" src="../../storage/treinos/supino-halter.gif" class="col-2">
                        <p class="col-10 fw-bolder text-center m-0">SUPINO HALTER</p>
                    </button>
                    <div class="collapse" id="collapseExample5">
                        <div class="card card-body border-dark border-2 background-black p-0 border-radius-none">
                            <div class="d-flex justify-content-center">
                                <img width="250" src="../../storage/treinos/supino-halter.gif">
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Série</th>
                                        <th scope="col">Repetições</th>
                                        <th scope="col">Carga (Kg)</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" value="" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button class="border-0 col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample">
                        <img width="50" src="../../storage/treinos/lunges-para-frente.gif" class="col-2">
                        <p class="col-10 fw-bolder text-center m-0">LUNGES PARA FRENTE</p>
                    </button>
                    <div class="collapse" id="collapseExample6">
                        <div class="card card-body border-dark border-2 background-black p-0 border-radius-none">
                            <div class="d-flex justify-content-center">
                                <img width="250" src="../../storage/treinos/lunges-para-frente.gif">
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Série</th>
                                        <th scope="col">Repetições</th>
                                        <th scope="col">Carga (Kg)</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" value="" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button class="border-0 col-12 btn background-black text-white p-0 d-flex align-items-center border-radius-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample7" aria-expanded="false" aria-controls="collapseExample">
                        <img width="50" src="../../storage/treinos/toque-no-calcanhar.gif" class="col-2">
                        <p class="col-10 fw-bolder text-center m-0">TOQUE NO CALCANHAR</p>
                    </button>
                    <div class="collapse" id="collapseExample7">
                        <div class="card card-body border-dark border-2 background-black p-0 border-radius-none">
                            <div class="d-flex justify-content-center">
                                <img width="250" src="../../storage/treinos/toque-no-calcanhar.gif">
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Série</th>
                                        <th scope="col">Repetições</th>
                                        <th scope="col">Carga (Kg)</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control p-0 border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </td>
                                        <td class="d-flex justify-content-center align-items-center p-3">
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn background-red text-white col-12 text-center border border-2 border-dark mb-3 p-1 border-radius-none" value="" id="finalizar">Finalizar</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('script')
@endsection