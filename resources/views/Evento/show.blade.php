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
@foreach ($evento as $event)
<div class="container-fluid">
	<div class="row">
		{{-- jumbotron --}}
		<div class="jumbotron jumbotron-fluid col-md-12 background-blue">
			<div class="container-fluid">
				<div class="row">
					<div class="col-2">
						<img src="{{ url("/storage/{$event->Logo}") }}" class="circle m-2 border-white" alt="logo_do_evento.{{$event->Nome}}">
					</div>
					<div class="col-8">
						<h1 class="display-4 text-blue-light">{{ $event->Nome }}</h1>
						<p class="lead text-blue-light">
							Inscrições até: {{ date("d/m/Y", strtotime($event->DataFim)) }} 
						</p>
						<a class="btn btn-success" href="{{ route('inscrever_user_evento',['idEvento' => $event->idEvento]) }}" role="button">Inscrever-se</a>
					</div>
				</div>
			</div>
		</div>
		
		
		{{-- conteudo --}}
		@if(session()->has('success'))
			<div class="alert alert-success col-12">
				{{ session()->get('success') }}
			</div>
		@elseif(session()->has('error'))
			<div class="alert alert-danger col-12">
				{{ session()->get('error') }}
			</div>
		@endif
		<div class="col-9">
			<div class="card">
				<div class="card-body">
					Descrição
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card">
				<div class="card-body">
					Conteúdo Programático
				</div>
			</div>
		</div>

		<div class="col-12">
				<div class="card">
					<div class="card-body">
						Atividades
					</div>
				</div>
			</div>
	</div>
</div>
@endforeach
@endsection