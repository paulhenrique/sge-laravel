@extends('admin.dashboard')

@section('container-dashboard')
<h1 class="text-center">Lista de Participantes da Atividade</h1>
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
                                        {{ 'Presente' }}
                                    @elseif($p->presente == False && $p->ausente == True)
                                        {{ 'Ausente' }}
                                    @elseif($p->presente == Null && $p->ausente == Null)
                                        {{ 'Selecione uma opcao' }}
                                    @else
                                        {{ 'Erro' }}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('registrar_lista_de_chamada_atividade',['idUserAtividade' => $p->idUserAtividade,'status' => 'Presente'])}}" class="text-white btn btn-success"> Presente</a>

                                        <a href="{{route('registrar_lista_de_chamada_atividade',['idUserAtividade' => $p->idUserAtividade,'status' => 'Ausente'])}}" class="text-white btn btn-danger"> Ausente</a>

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
