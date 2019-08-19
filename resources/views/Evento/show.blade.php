@extends('template.main')

@section('color-bg')
	background-image-solid
@endsection


@section('navbar')
	@include('components.navbar')
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
		<div class="col-9">
			<div class="card">
				<div class="card-body">
					This is some text within a card body.
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card">
				<div class="card-body">
					This is some text within a card body.
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection