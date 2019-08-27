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
			@if(count($eventos)==0) {
				<div class="col-md-12  text-center">
				<h1>Ainda Não Há Eventos Disponíveis</h1>
				<!-- Permitir exbição somente para Admins -->
				<p>Clique aqui para adicionar um novo evento: <a href="{{route('showForm_create_evento')}}">Adicionar Novo Evento</a><p>
				</div>
			@else
			<section id="services-evento">
					<div class="container">
						<div class="row">
								@foreach ($eventos as $evento)
							<div class="col-md-6 col-lg-4 wow bounceInUp">
								<div class="box mt-2">                            
								<img src="{{ url("/storage/{$evento->Logo}") }}" alt="logo_sge" class="mb-1 svg-classe">
								<h4 class="title"><a href="">{{$evento->Nome}}</a></h4>
								<div class="row text-center ">
										<a class="col-md-6 col-sm-2  links" href="{{ route('showEvent',['idEvento' => $evento->idEvento]) }}"><img src="{{ asset('images/search.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Visualizar</figcaption></a>
										<a class="col-md-6 col-sm-2  links" href="{{ route('inscrever_user_evento',[ 'idEvento' => $evento->idEvento]) }}"><img src="{{ asset('images/checked.svg') }}" class="img-fluid text-center  button list_svg"><figcaption>Inscrever</figcaption></a>
									</div>
								</div>
							</div>
							@endforeach
							<div class="col-4 p-6">
									<div class="card add circle">
											<a class="text-secondary p-3" href="{{ route('showForm_create_evento') }}">
												<img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid text-center col-md-12 p-1">
											</a>
									</div>
								</div>			
						</div>	
					</div>
				</section>					
			@endif
		</div>
	</div>
@endsection