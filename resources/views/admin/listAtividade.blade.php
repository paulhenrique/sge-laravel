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
        
        @foreach ($atividades as $atividade)
            @if ($atividade->CondicaoAtividade == "Ativado")
                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2" id="services-evento">
                    <div class="box ">
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo ucfirst($atividade->nomeAtividade) ?></h4>
                            <hr id="list_hr">
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Início: </strong> {{ date("d/m/Y", strtotime($atividade->DataInicio)) }} <strong> às </strong> {{$atividade->HoraInicio}} <strong> <br>Término: </strong>{{ date("d/m/Y", strtotime($atividade->DataTermino)) }} <strong> até</strong> {{$atividade->HoraTermino}} </small></p>
                            <div class="row text-center">
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showFormAtividade', ['idAtividade' => $atividade->idAtividade])}}"><img src="{{ asset('images/edit.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Editar</figcaption></a>
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('deletar_atividade', ['idAtividade' => $atividade->idAtividade])}}"><img src="{{ asset('images/delete.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Excluir</figcaption></a>
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="#"><img src="{{ asset('images/checklist.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Lista de Chamada</figcaption></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

		@endforeach
                <div class="col-lg-4 col-md-4 p-6">
					<div class="card add circle ">
							<a class="text-secondary p-3" href="{{ route('showFormAtividade') }}">
								<img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid text-center col-md-12 button p-1">
							</a>
					</div>
				</div>
				
        </div>
	</div>
@endsection
