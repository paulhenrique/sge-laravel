@extends('template.main')

@section('navbar')
@endsection


@section('content')

@foreach ($eventos as $evento)

<h1> Nome: {{$evento->Nome}}</h1>
<ul>
	<li><a href="{{ route('listAtividade',['idEvento' => $evento->idEvento]) }}"> Ver atividades do evento </a></li>
	<li><a href="{{ route('showFormAtividade') }}"> Adicionar Atividades </a></li>
	<li><a href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"> Editar </a></li>
	<li><a href="{{ route('inscrever_user_evento',['idUser' => auth()->user()->id, 'idEvento' => $evento->idEvento]) }}">Inscrever-se</a></li>
</ul>

@endforeach

@endsection

@section('footer')
@endsection