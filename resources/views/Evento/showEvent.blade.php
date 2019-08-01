@extends('template.main')

@section('navbar')
@endsection


@section('content')

@foreach ($eventos as $evento)

<h1> Nome: {{$evento->Nome}}</h1>
<a href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"> Editar </a>
<a href="{{ route('inscrever_user',['idUser' => auth()->user()->id, 'idEvento' => $evento->idEvento]) }}">Inscrever-se</a>
@endforeach

@endsection

@section('footer')
@endsection