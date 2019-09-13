@extends('admin.dashboard')

@section('container-dashboard')
<div class="container">
		<div class="row">
             @foreach ($images as $image)
                <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2 wow bounceInUp">
                    <div class="card ">
                        <img src="{{ url("/storage/{$image->Images}") }}" class="img-fluid list_image">
                    </div>
                </div>
            @endforeach
            <div class="col-4 p-6">
                <div class="card add circle">
                        <a class="text-secondary p-3" data-toggle="modal" data-target="#adcImage">
                            <img src="{{ asset('images/plus-icon.svg') }}" class="img-fluid text-center col-md-12 button p-1">
                        </a>
                </div>
            </div>
        </div>
</div>
@endsection




<!-- Modal -->
<div class="modal fade" id="adcImage" tabindex="-1" role="dialog" aria-labelledby="adcImage" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- -->
            <form class="col-md-12" method="post" action="{{route('add_image_evento') }}" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="idEvento" value="{{$idEvento}}">
                <div class="form-group row">
                <label for="logo" class="label-upload-image">
                    <img class="col-12" src="{{ asset('images/upload-icon.svg') }}">
                </label>
                    <input type="file" class="form-control" id="logo" name="image">
                    <h3 class="text-center col-12" id="exampleModalLabel">Adicionar Imagem</h3>
                </div>

                <button type="submit" class="btn btn-primary col-md-12">Enviar</button>
            </form>
      </div>
    </div>
  </div>
</div>