@extends('template.main')

@section('color-bg')
	background-image
@endsection

@section('navbar')
	@include('components.navbar')
@endsection

@section('content')

	<div class="row">
		<?php 
		if(count($eventos)==0) {
		?>
		<div class="col-md-12 text-center">
		<h1>Ainda Não Há Eventos Disponíveis</h1>
		<!-- Permitir exbição somente para Admins -->
		<p>Clique aqui para adicionar um novo evento: <a href="{{route('showForm_create_evento')}}">Adicionar Novo Evento</a>  <p>
		</div>
		<?php
		}else{
		?>
		@foreach ($eventos as $evento)
			<div class="card col-md-4">
			<!--<img src="{{$evento->Logo}}" class="card-img-top" alt="...">-->
			<img src="{{ url('/storage/{$evento->Logo}') }}" class="img-fluid" alt="">
				<div class="card-body">
					<h5 class="card-title text-center">{{$evento->Nome}}</h5>
					<div class="row">
						<a class="btn btn-primary col-md-5 m-2" href="{{ route('listAtividade',['idEvento' => $evento->idEvento]) }}"> Ver atividades</a>
						<a class="btn btn-success col-md-5 m-2" href="{{ route('inscrever_user_evento',['idUser' => auth()->user()->id, 'idEvento' => $evento->idEvento]) }}">Inscrever-se</a>
						<a class="btn btn-info col-md-5 m-2" href="{{ route('showFormAtividade') }}"> Adicionar Atividade </a>
						<a class="btn btn-warning col-md-5 m-2" href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"> Editar </a>
						<a class="btn btn-danger col-md-5 m-auto" href="{{route('deletar_evento', ['idEvento' => $evento->idEvento])}}"> Excluir Evento </a>
					</div>
				</div>
			</div>
		@endforeach
		<?php
		}
		?>
	</div>
@endsection

@section('footer')
	@include('components.footer')
@endsection