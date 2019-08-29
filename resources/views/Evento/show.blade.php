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
		<div class="col-7">
			<div class="card">
				<div class="card-body">
					<h3>Descrição</h3>
					<hr>
				<p class="text-justify h4">O evento <strong>{{$event->Nome}}</strong> será realizado no(s) dia(s) <strong>{{ date("d/m/Y", strtotime($event->DataInicio)) }} </strong> à <strong>{{ date("d/m/Y", strtotime($event->DataFim)) }}</strong>, no local: <strong>{{$event->Local}}</strong>, às: <strong> {{$event->HorarioInicio}}</strong> até <strong> {{$event->HorarioFim}}</strong>, 
					ministrado por: <strong>{{$event->Responsavel}}</strong>. </p>
					<h3 class="text-center"> Carga Horária</h3>
					<hr>
					<p class="text-center h3"> {{$event->CargaHoraria}} </p>
				</div>
			</div>
		</div>
		<div class="col-5">
			<div class="card">
				<div class="card-body">
					<h3 class="text-center">Conteúdo Programático</h3>
					<hr>
					<p class="text-justify"> {{$event->ConteudoProgramatico}} </p>
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