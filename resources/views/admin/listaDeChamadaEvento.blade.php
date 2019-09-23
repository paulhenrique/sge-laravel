@extends('admin.dashboard')

@section('container-dashboard')
<h1 class="text-center">Lista de Participantes do Evento: {{$evento[0]->Nome}}</h1>
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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participantes as $p)
                            <tr>
                                <th scope="row">{{$p->idUser}}</th>
                                <td>{{$p->name}}</td>
                                <td>
                                    @if($p->presente == True && $p->ausente == False)
                                        {{ 'P' }}
                                    @elseif($p->presente == False && $p->ausente == True)
                                        {{ 'A' }}
                                    @elseif($p->presente == Null && $p->ausente == Null)
                                        {{ 'Selecione uma opcao' }}
                                    @else
                                        {{ 'Erro' }}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('registrar_lista_de_chamada',['idUserEvento' => $p->iduserEvento,'status' => 'P'])}}" class="text-white btn btn-success"> Presente</a>
                                        
                                        <a href="{{route('registrar_lista_de_chamada',['idUserEvento' => $p->iduserEvento,'status' => 'A'])}}" class="text-white btn btn-danger"> Ausente</a>

                                    </div>
                                    <a href="{{route('tornar_adm')}}" class="text-white btn btn-success"> Tornar administrador</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
