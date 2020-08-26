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
        @foreach ($templates as $template)
            
                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2" id="services-evento">
                    <div class="form-box">
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo ucfirst($template->Nome) ?></h4>
                            <hr id="list_hr">
                            <p class="text-center"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Local do Arquivo: </strong> {{$template->Local_do_Arquivo}} </small></p>
                            <div class="row text-center">
                                <a class="col-md-4 col-sm-6 col-xl-6 links" href="{{ route('form_template', ['idTemplate' => $template->idTemplate])}}"><img src="{{ asset('images/edit.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Editar</figcaption></a>
                                <a class="col-md-4 col-sm-6 col-xl-6 links" href="{{ route('delete_template', ['idTemplate' => $template->idTemplate])}}"><img src="{{ asset('images/delete.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Deletar</figcaption></a>
                            </div>
                            <button type="button" class="btn btn-info col-12" data-toggle="modal" data-target="#_{{$template->Nome}}">Preview</button>
                        </div>
                    </div>
                    
                    <div class="modal fade bd-example-modal-lg" id="_{{$template->Nome}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <img class="img-fluid" src="{{ url("/storage/{$template->Image_preview}") }}" alt="{{$template->Nome}}">
                            </div>
                        </div>
                    </div>
                </div>
		@endforeach
        <div class="col-lg-4 col-md-4 p-6">
            <div class="card add circle ">
                    <a class="text-secondary p-3" href="{{ route('form_template') }}">
                        <img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid text-center col-md-12 button p-1">
                    </a>
            </div>
		</div>
        </div>
	</div>
@endsection
