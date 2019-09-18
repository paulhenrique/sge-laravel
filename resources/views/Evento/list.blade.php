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
			@if(session()->has('success'))
				<div class="alert alert-success col-12">
					{{ session()->get('success') }}
				</div>
			@elseif(session()->has('error'))
				<div class="alert alert-danger col-12">
					{{ session()->get('error') }}
				</div>
			@endif
		</div>

		<div class="row">
			@if(count($eventos)==0)
				<div class="col-md-12  text-center">
				<h1>Ainda Não Há Eventos Disponíveis</h1>
				<!-- Permitir exbição somente para Admins -->
				<p>Clique aqui para adicionar um novo evento: <a href="{{route('showForm_create_evento')}}">Adicionar Novo Evento</a><p>
				</div>
			@else
					<div class="container">
						<section id="services-evento">
						<div class="row">
							@foreach ($eventos as $evento)
								@if ($evento->CondicaoEvento == "Ativado")
								<div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2">
									<div class="box ">
											<img src="{{ url("/storage/{$evento->Logo}") }}" class="img-fluid list_image" alt="logo_do_evento.{{$evento->Nome}}">
										<div class="card-body">
											
											<h4 class="card-title text-center">{{$evento->Nome}}</h4>
											<hr id="list_hr">
											<div class="row text-center ">
												<a class="col-md-6 col-sm-2  links" href="{{ route('showEvent',['idEvento' => $evento->idEvento]) }}"><img src="{{ asset('images/search.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Visualizar</figcaption></a>
												<a class="col-md-6 col-sm-2  links" href="{{ route('inscrever_user_evento',[ 'idEvento' => $evento->idEvento]) }}"><img src="{{ asset('images/checked.svg') }}" class="img-fluid text-center  button list_svg"><figcaption>Inscrever</figcaption></a>
												
											</div>
										</div>
									</div>
								</div>
								@endif
							@endforeach
								@can("isAdmin")
								<div class="col-4 p-6">
										<div class="card add circle">
												<a class="text-secondary p-3" href="{{ route('showForm_create_evento') }}">
													<img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid text-center col-md-12 p-1">
												</a>
										</div>
								</div>	
								@endcan		
							</div>
							
						</section>	
					</div>				
			@endif
		</div>
	</div>
@endsection
