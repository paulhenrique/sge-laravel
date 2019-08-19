@extends('template.main')

@section('color-bg')
	background-image-solid
@endsection


@section('navbar')
	@include('components.navbar')
@endsection

@section('footer')
	@include('components.footer')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			@if(count($eventos)==0) {
				<div class="col-md-12 text-center">
				<h1>Ainda Não Há Eventos Disponíveis</h1>
				<!-- Permitir exbição somente para Admins -->
				<p>Clique aqui para adicionar um novo evento: <a href="{{route('showForm_create_evento')}}">Adicionar Novo Evento</a><p>
				</div>
			@else
				@foreach ($eventos as $evento)
					<div class="col-4 p-2">
						<div class="card  ">
						<img src="{{ url("/storage/{$evento->Logo}") }}" class="img-fluid content" alt="logo_do_evento.{{$evento->Nome}}">
							<div class="card-body">
								<h5 class="card-title text-center">{{$evento->Nome}}</h5>
								<div class="row">
									<a class="btn btn-primary col-md-5 m-2" href="{{ route('showEvent',['idEvento' => $evento->idEvento]) }}"> Ver mais</a>
									<a class="btn btn-success col-md-5 m-2" href="{{ route('inscrever_user_evento',['idUser' => auth()->user()->id, 'idEvento' => $evento->idEvento]) }}">Inscrever-se</a>
									<a class="btn btn-info col-md-5 m-2" href="{{ route('showFormAtividade') }}"> Adicionar Atividade </a>
									<a class="btn btn-warning col-md-5 m-2" href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"> Editar </a>
									<a class="btn btn-danger col-md-5 m-auto" href="{{route('deletar_evento', ['idEvento' => $evento->idEvento])}}"> Excluir Evento </a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<div class="col-4 p-2">
					<div class="card">
						<div class="card-body">
							<a class="text-secondary" href="{{ route('showForm_create_evento') }}">
								<img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid content col-md-12">
								<h5 class="card-title text-center">Adicionar Evento</h5>
							</a>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection