@extends('admin.dashboard')


@section('container-dashboard')
<h1 class="text-center">Lista de Participantes do Evento $$$$$</h1>
<div class="container">
    <div class="card form-box col-md-10 col-sm-12 m-auto">
        <div class="card-body row p-0">
            <div class="col-md-12 p-5">
            <form method="post" action="" >
                @csrf
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-success active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Presente
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> Ausente
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
                

                <button type="submit" class="btn btn-primary">Registrar Chamada</button>
            </form>
        </div>
    </div>
</div>
@endsection
