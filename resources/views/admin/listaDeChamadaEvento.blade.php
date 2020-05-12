@extends('admin.dashboard')

@section('container-dashboard')
<h1 class="text-center">Lista de Participantes do Evento: {{$evento[0]->Nome}}</h1>
<div class="container">
    <div class="card form-box col-md-12 col-sm-12 p-5" style="overflow-x:scroll">
        <div class="card-body row p-0">

            <div class="col-md-12 col-sm-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participantes as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>
                                    <div>
                                        @if($p->presente == True && $p->ausente == False)
                                            {{ 'P' }}
                                        @elseif($p->presente == False && $p->ausente == True)
                                            {{ 'A' }}
                                        @elseif($p->presente == Null && $p->ausente == Null)
                                            {{ 'Selecione uma opcao' }}
                                        @else
                                            {{ 'Erro' }}
                                        @endif
                                    </div>
                                
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('registrar_lista_de_chamada',['idUserEvento' => $p->iduserEvento,'status' => 'P'])}}" class="text-white btn btn-success"> Presente</a>

                                        <a href="{{route('registrar_lista_de_chamada',['idUserEvento' => $p->iduserEvento,'status' => 'A'])}}" class="text-white btn btn-danger"> Ausente</a>
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
