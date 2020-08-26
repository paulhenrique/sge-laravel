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
		<div class="jumbotron jumbotron-fluid col-12 py-2">
			<div class="container">
				<div class="display-4 col-12 text-center">
					<img src="{{ url("/storage/{$eventos->Logo}") }}" class="circle-event-logo m-2  border-white m-2" alt="logo_do_evento_{{$eventos->Nome}}">
				</div>
				<h1 class="display-4 text-center"><strong>{{ $eventos->Nome }}</strong></h1>
				@if($eventos->inscrito == false)
				    <h2 class="text-center"><a class="btn btn-outline-success " href="{{ route('inscrever_user_evento',['idEvento' => $eventos->idEvento]) }}" role="button">Inscrever-se</a></h2>
				@else
				    <h2 class="text-center"><a class="btn btn-outline-danger " href="{{ route('desinscrever',['idEvento' => $eventos->idEvento]) }}" role="button">Desinscrever-se</a></h2>
				@endif
				<p class="lead text-center">
					<strong>Inscrições até: {{ date("d/m/Y", strtotime($eventos->DataLimiteInscricao)) }}</strong>
				</p>
				<p class="lead mx-auto col-lg-8 col-md-12 text-justify">
					O evento <strong>{{$eventos->Nome}}</strong> será realizado no(s) dia(s) <strong>{{ date("d/m/Y", strtotime($eventos->DataInicio)) }} </strong> à <strong>{{ date("d/m/Y", strtotime($eventos->DataFim)) }}</strong>, no local: <strong>{{$eventos->Local}}</strong>, às: <strong> {{$eventos->HorarioInicio}}</strong> até <strong> {{$eventos->HorarioFim}}</strong>, organizado por: <strong>{{$eventos->Responsavel}}</strong>.
				</p>
			</div>
		</div>
		<div class="col-12">
			<div class="container-fluid">
				<div class="page-header">
					<h1 class="text-center">Atividades</h1>
					<hr>
				</div>
				<div class="col-12 mx-auto text-center">
					<div style="display:inline-block;width:100%;overflow-y:auto;">
						<ul class="timeline timeline-horizontal">
							@foreach ($atividades as $atividade)
							@if($atividade->CondicaoAtividade == "Ativado")
								<li class="timeline-item">
									<div class="timeline-badge primary"><i class="text-center glyphicon glyphicon-check"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h4 class="timeline-title"><?php echo ucfirst($atividade->nomeAtividade)?></h4>
											<p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Início: </strong> {{ date("d/m/Y", strtotime($atividade->DataInicio)) }} <strong> às </strong> {{$atividade->HoraInicio}} <strong> <br>Término: </strong>{{ date("d/m/Y", strtotime($atividade->DataTermino)) }} <strong> até</strong> {{$atividade->HoraTermino}} </small></p>
										</div>
										<div class="timeline-body">
										@if($atividade->inscrito == false)
										<p><a class="btn btn-outline-success " href="{{ route('inscrever_user_atividade',['idAtividade' => $atividade->idAtividade, 'idEvento' => $eventos->idEvento]) }}" role="button">Inscrever-se</a></p>
										@else
										<p><a class="btn btn-outline-danger " href="{{ route('desinscrever_user_atividade',['idAtividade' => $atividade->idAtividade, 'idEvento' => $eventos->idEvento]) }}" role="button">Desinscrever-se</a></p>
										@endif
										</div>
									</div>
								</li>
							@endif
							@endforeach
						</ul>
					</div>
				</div>
				@if($eventos->CondicaoCadastroDeAtividade == "Sim")
					@can("isParticipante")
						<div class="lead mx-auto col-lg-8 col-md-8 text-justify">
							<p>Esse evento está aberto para receber atividades da comunidade, caso deseje participar, basta clicar no botão abaixo, preencher o formulário e aguardar a resposta em seu email.</p>
							<div class="col-4 mx-auto my-1"><a class="btn btn-success" 
							href="{{ route('showFormAtividade',['idEvento' => $eventos->idEvento]) }}" 
							role="button">Enviar Proposta!</a></div>
						</div>
					@endcan
				@endif
			</div>
		</div>
		<div class="jumbotron jumbotron-fluid col-12 mb-0">
			<div class="container-fluid py-3">
				<div class="page-header">
					<h1 class="text-center">Galeria do Evento</h1>
					<hr>
				</div>
				<div class="container">
					<div class="row">
						@foreach ($images as $image)
						<div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 bounceInUp">
							<div class="box">
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


@endsection
