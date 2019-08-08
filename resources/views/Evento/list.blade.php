@extends('template.main')

@section('color-bg')
	background-image
@endsection

@section('navbar')
	@include('components.navbar')
@endsection

@section('content')

	<div class="row">
		@foreach ($eventos as $evento)
			<div class="card col-md-4">
			<!--<img src="{{$evento->Logo}}" class="card-img-top" alt="...">-->
			<img src="{{ url("/storage/{$evento->Logo}") }}" class="img-fluid" alt="">
				<div class="card-body">
					<h5 class="card-title text-center">{{$evento->Nome}}</h5>
					{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
					<div class="row">
						<a class="btn btn-primary col-md-5 m-2" href="{{ route('listAtividade',['idEvento' => $evento->idEvento]) }}"> Ver atividades</a>
						<a class="btn btn-success col-md-5 m-2" href="{{ route('showFormAtividade') }}"> Adicionar Atividades </a>
						<a class="btn btn-danger col-md-5 m-2" href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"> Editar </a>
						<a class="btn btn-success col-md-5 m-2" href="{{ route('inscrever_user_evento',['idUser' => auth()->user()->id, 'idEvento' => $evento->idEvento]) }}">Inscrever-se</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection

@section('footer')
@endsection