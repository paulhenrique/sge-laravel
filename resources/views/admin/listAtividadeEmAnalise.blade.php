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
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo ucfirst($atividade->nomeAtividade) ?></h4>
                            <hr id="list_hr">
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Descrição: </strong> {{$atividade->Descricao}} </small></p>
                            <div class="row text-center">
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('alterar_condicao', ['idAtividade' => $atividade->idAtividade, 'avaliacao'=>'Ativado'])}}"><img src="{{ asset('images/checked.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Aceitar Pedido</figcaption></a>
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('showFormAtividade', ['idAtividade' => $atividade->idAtividade])}}"><img src="{{ asset('images/edit.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Editar</figcaption></a>
                                <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('alterar_condicao', ['idAtividade' => $atividade->idAtividade, 'avaliacao'=>'Negado'])}}"><img src="{{ asset('images/cancel.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Negar Pedido</figcaption></a>
                            </div>
                        </div>
					
                    </div>
                </div>
		@endforeach
        </div>
	</div>
@endsection
