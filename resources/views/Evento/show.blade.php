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
		@if(session()->has('success'))
		<div class="alert alert-success col-12">
			{{ session()->get('success') }}
		</div>
		@elseif(session()->has('error'))
		<div class="alert alert-danger col-12">
			{{ session()->get('error') }}
		</div>
		@endif
		<div class="jumbotron jumbotron-fluid col-12 py-3">
			<div class="container">
				<div class="display-4 col-12 text-center">
					<img src="{{ url('/storage/' .$event->Logo) }}" class="circle-event-logo m-2  border-white m-2" alt="logo_do_evento.{{$event->Nome}}">
				</div>
				<h1 class="display-4 text-center"><strong>{{ $event->Nome }}</strong></h1>
				<h2 class="text-center"><a class="btn btn-outline-success " href="{{ route('inscrever_user_evento',['idEvento' => $event->idEvento]) }}" role="button">Inscrever-se</a></h2>
				<p class="lead text-center">
					<strong>Inscrições até: {{ date("d/m/Y", strtotime($event->DataFim)) }}</strong>
				</p>
				<p class="lead mx-auto col-8 text-justify">
					O evento <strong>{{$event->Nome}}</strong> será realizado no(s) dia(s) <strong>{{ date("d/m/Y", strtotime($event->DataInicio)) }} </strong> à <strong>{{ date("d/m/Y", strtotime($event->DataFim)) }}</strong>, no local: <strong>{{$event->Local}}</strong>, às: <strong> {{$event->HorarioInicio}}</strong> até <strong> {{$event->HorarioFim}}</strong>, organizado por: <strong>{{$event->Responsavel}}</strong>.
				</p>
			</div>
		</div>
		<div class="col-12">
			<div class="container-fluid py-3">
				<div class="page-header">
					<h1 class="text-center">Atividades</h1>
					<hr>
				</div>
				<div class="col-8 mx-auto">
					<div style="display:inline-block;width:100%;overflow-y:auto;">
						<ul class="timeline timeline-horizontal">
							@foreach ($atividades as $atividade)
							<li class="timeline-item">
								<div class="timeline-badge primary"><i class="glyphicon glyphicon-check"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title"><?php echo ucfirst($atividade->nomeAtividade)?></h4>
										<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Início: </strong> {{ date("d/m/Y", strtotime($atividade->DataInicio)) }} <strong> às </strong> {{$atividade->HoraInicio}} <strong> <br>Término: </strong>{{ date("d/m/Y", strtotime($atividade->DataTermino)) }} <strong> até</strong> {{$atividade->HoraTermino}} </small></p>
									</div>
									<div class="timeline-body">
										<p><a class="btn btn-outline-dark " href="{{ route('inscrever_user_atividade',['idEvento' => $event->idEvento]) }}" role="button">Inscrever-se</a></p>
									</div>
								</div>
                            </li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="card col-12">
			<div class="container-fluid py-3">
				<div class="page-header">
					<h1 class="text-center">Fotos</h1>
					<hr>
				</div>
				<div class="container">
					<div class="row">
						@foreach ($images as $image)
						<div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 wow bounceInUp">
							<div class="card">
								<img src="{{ url("/storage/{$image->Images}") }}" class="img-fluid list_image">
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endforeach
@endsection
