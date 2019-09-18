@extends('admin.dashboard')


@section('container-dashboard')
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
				@foreach ($eventos as $evento)
					<div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2">
						<div class="card ">
						@if ($evento->CondicaoEvento == "Ativado")
						<img src="{{ url("/storage/{$evento->Logo}") }}" class="img-fluid list_image" alt="logo_do_evento.{{$evento->Nome}}">
							<div class="card-body">
								<h4 class="card-title text-center"><?php echo ucfirst($evento->Nome) ?></h4>
								<hr id="list_hr">
								<div class="row text-center">
									<a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showEvent',['idEvento' => $evento->idEvento]) }}"><img src="{{ asset('images/search.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Visualizar</figcaption></a>
									<a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showFormAtividade') }}"><img src="{{ asset('images/plus.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Adicionar Atividade</figcaption></a>
									<a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showForm_create_evento', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/edit.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Editar</figcaption></a>
									<a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('lista_de_chamada', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/checklist.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Lista de Chamada</figcaption></a>
									<a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('deletar_evento', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/delete.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Excluir</figcaption></a>
									<a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('show_galeria', ['idEvento' => $evento->idEvento])}}"><img src="{{ asset('images/galery_add.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Galeria</figcaption></a>
								</div>
							</div>
						@else
							<h1>Está desativado</h1>
						@endif
						</div>
					</div>
				@endforeach
				<div class="col-lg-4 col-md-4 p-6">
					<div class="card add circle ">
							<a class="text-secondary p-3" href="{{ route('showForm_create_evento') }}">
								<img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid text-center col-md-12 button p-1">
							</a>
					</div>
				</div>
			@endif
        </div>

	</div>
@endsection
