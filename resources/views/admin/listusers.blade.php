@extends('admin.dashboard')

@section('container-dashboard')
<h1 class="text-center">Lista de Todos os usuários</h1>
<div class="container">

        <div class="card-body row p-0">
            <div class="col-md-12 col-sm-12">
                    <li class="list-group-item"> ID | Nome | Status | Promoção </li>
                        @foreach($users as $user)
                        <ul class="list-group form-box">

                        <li class="list-group-item col-12">{{$user->id}} | {{$user->name}} | {{$user->tipoUser}} |
                            <div class="btn-group float-right">
                                <a href="{{ route('tornarAdmin',['idUser' => $user->id]) }}" class="text-white btn btn-success"> Promover</a>
                            </div>
                        </li>
                        </ul>

                        @endforeach

                </table>
        </div>
    </div>


</div>
@endsection
