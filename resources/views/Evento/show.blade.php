@extends('template.main')

@section('color-bg')
	background-image-solid
@endsection


@section('navbar')
	@include('components.navbar')
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">		
		<div class="col-md-12 background-blue">
				@foreach ($evento as $event)
			<div class="col-4">
				<img src="{{ url("/storage/{$event->Logo}") }}" class="circle m-2" alt="logo_do_evento.{{$event->Nome}}">
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection