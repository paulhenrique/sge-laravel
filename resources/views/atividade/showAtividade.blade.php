@extends('template.main')

@section('navbar')
@endsection


@section('content')

@foreach ($atividades as $atividade)

<h1> Nome: {{$atividade->nomeAtividade}}</h1>
<ul>
	<li><a href="{{ route('showFormAtividade', ['idAtividade' => $atividade->idAtividade])}}"> Editar </a></li>
	<li><a href="{{ route('inscrever_user_atividade', ['idAtividade' => $atividade->idAtividade, 'idEvento' => $atividade->idEvento])}}">Inscrever-se na atividade</a></li>
</ul>


@endforeach

@endsection

@section('footer')
@endsection