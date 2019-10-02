@extends('admin.dashboard')

@section('container-dashboard')
<h1 class="text-center">Lista de Todos os usuários</h1>
<div class="container">
    <div class="card form-box col-md-12 col-sm-12 m-4">
        <div class="card-body row p-0">

            <div class="col-md-12 p-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Status</th>
                            <th scope="col">Promover para Administrador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>
                                    {{$user->tipoUser}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{ route('tornarAdmin',['idUser' => $user->id]) }}" class="text-white btn btn-success"> Promover</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
