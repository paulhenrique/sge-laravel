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
            
                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2" id="services-evento">
                    <div class="box ">
					@if ($atividade->CondicaoAtividade == "Ativado")
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo ucfirst($atividade->nomeAtividade) ?></h4>
                            <hr id="list_hr">
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Início: </strong> {{ date("d/m/Y", strtotime($atividade->DataInicio)) }} <strong> às </strong> {{$atividade->HoraInicio}} <strong> <br>Término: </strong>{{ date("d/m/Y", strtotime($atividade->DataTermino)) }} <strong> até</strong> {{$atividade->HoraTermino}} </small></p>
                            <div class="row text-center">
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showFormAtividade', ['idAtividade' => $atividade->idAtividade])}}"><img src="{{ asset('images/edit.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Editar</figcaption></a>
                                <a class="col-md-4 col-sm-6 col-xl-4 links" class="img-fluid text-center button list_svg" data-toggle="modal" data-target="#exampleModal_{{$atividade->idAtividade}}"><img src="{{ asset('images/delete.svg') }}" class="img-fluid text-center button list_svg" ><figcaption>Desativar</figcaption></a>
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('lista_de_chamada_atividade', ['idAtividade' => $atividade->idAtividade])}}"><img src="{{ asset('images/checklist.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Lista de Chamada</figcaption></a>
                            </div>
                        </div>
					@else
					<div class="card-body desativado">
                            <h4 class="card-title text-center"><?php echo ucfirst($atividade->nomeAtividade) ?></h4>
                            <hr id="list_hr">
							<h4 class="text-center">Atividade Desativada</h4>
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Início: </strong> {{ date("d/m/Y", strtotime($atividade->DataInicio)) }} <strong> às </strong> {{$atividade->HoraInicio}} <strong> <br>Término: </strong>{{ date("d/m/Y", strtotime($atividade->DataTermino)) }} <strong> até</strong> {{$atividade->HoraTermino}} </small></p>
                            <div class="row text-center">
                                <a class="col-md-12 col-sm-12 col-xl-12 links" href="{{ route('lista_de_chamada_atividade', ['idAtividade' => $atividade->idAtividade])}}"><img src="{{ asset('images/checklist.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Lista de Chamada</figcaption></a>
                            </div>
                        </div>
						@endif
						<!-- Modal -->
						<div class="modal fade" id="exampleModal_{{$atividade->idAtividade}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Desativar Atividade</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Deseja realmente desativar a atividade permanentemente? A ação não poderá ser desfeita.
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<a href="{{ route('deletar_atividade', ['idAtividade' => $atividade->idAtividade])}}"><button type="button" class="btn btn-danger">Desativar</button></a>
							</div>
							</div>
						</div>
						</div>
                    </div>
                </div>
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
