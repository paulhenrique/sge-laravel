@extends('admin.dashboard')


<?php
    //dd($template);
  if (isset($template)) {
      $action = route('update_template');
  } else {
      $action = route('create_template');
  }
?>

@section('container-dashboard')

<div id="services-template">
    <div class="form-box text-left col-md-6 m-auto">
        <div class="card-body row p-0">
            <div class="col-md-12 p-5">
                <h1 class="text-center">Criar Novo Template</h1>
                <hr>
                <div class="col-12 m-auto">
                    <form method="post" id="form_conteudo_programatico" action="{{ $action }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="idTemplate" value="{{ isset($template) ? $template->idTemplate : '' }}">

                        <div class="form-group">
                            <label for="Nome">Nome Template: </label>
                            <input type="Text" class="form-control" id="Name" name="Nome" value="{{ isset($template) ? $template->Nome : '' }}" placeholder="Insira um nome para o template">
                        </div>

                        <div class="form-group">
                            <label for="Local_do_Arquivo">Local do Arquivo: </label>
                            <input type="Text" class="form-control" id="Local_do_Arquivo" name="Local_do_Arquivo" value="{{ isset($template) ? $template->Local_do_Arquivo : '' }}" placeholder="Insira o nome do local do arquivo">
                        </div>
                </div>


                <div class="form-group welcome-left d-flex align-items-center justify-content-center align-self-center">
                    <label for="Image_preview">
                        <p class="text-center"><img class="icon" src="{{ asset('images/upload-icon.svg') }}"></p>
                    </label>
                    <input type="file" class="form-control" id="Image_preview" name="Image_preview" value="{{ isset($template) ? $template->Image_preview : "" }}">

                </div>

                <button type="submit" class="btn btn-outline-primary btn-block">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection