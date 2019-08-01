@extends('template.main')

@section('navbar')
@endsection


@section('content')

@foreach ($atividades as $atividade)

<h1> Nome: {{$atividade->nomeAtividade}}</h1>
<a href="{{ route('showFormAtividade', ['idAtividade' => $atividade->idAtividade])}}"> Editar </a>
@endforeach

@endsection

@section('footer')
@endsection