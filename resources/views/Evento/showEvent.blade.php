@extends('template.main')

@section('content')

@if ((count($eventos)) != 0)
@foreach ($eventos as $evento)
<h1> Nome do Evento: {{ $evento->Nome }}</h1>

<a href="{{ route('deletar_evento', ['idEvento' => $evento->idEvento]) }}"> Deletar: {{$evento->Nome}}</a>
<a href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento]) }}"> Editar: {{$evento->Nome}}</a>
@endforeach
@else
    <h1> Nenhum evento cadastrado </h1>
@endif

<a 


@endsection