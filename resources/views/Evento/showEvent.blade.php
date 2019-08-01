@extends('template.main')

@section('navbar')
@endsection


@section('content')

@foreach ($eventos as $evento)

<h1> Nome: {{$evento->Nome}}</h1>
<a href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"> Editar </a>
@endforeach

@endsection

@section('footer')
@endsection