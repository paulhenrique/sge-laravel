@extends('template.main')

@section('navbar')
@endsection

<?php 
  if(isset($eventos)){
    $action = route('editar_evento');
  }else{
    $action = route('create_evento');
  }
?>
@section('content')
<div class="container-fluid">
  <h1 class="text-center">Cadastrar Evento</h1>
  <div class="col-6 m-auto">
    <form method="post" action="{{ $action }}" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="idEvento" value="{{ isset($eventos) ? $eventos->idEvento : '' }}">
       <div class="form-group">
         <label for="Nome">Nome Evento: </label>
       <input type="Text" class="form-control" id="Name" name="nome" value="{{ isset($eventos) ? $eventos->Nome : '' }}">
       </div>

        <div class="form-group">
          <label for="Responsavel">Responsável: </label>
          <input type="Text" class="form-control" id="Responsavel" name="responsavel" value="{{ isset($eventos) ? $eventos->Responsavel : '' }}">
        </div>
        
        <div class="form-group">
          <label for="CargaHoraria">Carga Horária: </label>
          <input type="Text" class="form-control" id="CargaHoraria" name="cargaHoraria" value="{{ isset($eventos) ? $eventos->CargaHoraria : '' }}">
        </div>
        
        <div class="form-group">
          <label for="Local">Local: </label>
          <input type="Text" class="form-control" id="Local" name="local" value="{{ isset($eventos) ? $eventos->Local : "" }}">
        </div>

        <div class="form-group">
          <label for="ConteudoProgramatico">Conteúdo Programático: </label>
          <textarea class="form-control" name="ConteudoProgramatico" id="ConteudoProgramatico">{{ isset($eventos) ? $eventos->ConteudoProgramatico : "" }}</textarea>
        </div>

        <div class="form-group">
          <label for="dtInicio">Data Inicio: </label>
          <input type="date" class="form-control" id="dtInicio" name="dtInicio" value="{{ isset($eventos) ? $eventos->DataInicio : "" }}">
        </div>
        
        <div class="form-group">
          <label for="dtFim">Data Fim: </label>
          <input type="date" class="form-control" id="dtFim" name="dtFim" value="{{ isset($eventos) ? $eventos->DataFim : "" }}">
        </div>

        <div class="form-group">
          <label for="dtFim">Data Limite de Inscrição: </label>
          <input type="date" class="form-control" id="dtlimite" name="dtlimite" value="{{ isset($eventos) ? $eventos->DataLimiteInscricao : "" }}">
        </div>

        <div class="form-group">
          <label for="hrInicio">Horária Inicio: </label>
          <input type="time" class="form-control" id="hrInicio" name="hrInicio" value="{{ isset($eventos) ? $eventos->HorarioInicio : "" }}">
        </div>
        
        <div class="form-group">
          <label for="hrFim">Horário Fim: </label>
          <input type="time" class="form-control" id="hrFim" name="hrFim" value="{{ isset($eventos) ? $eventos->HorarioFim : "" }}">
        </div>

        <div class="form-group">
            <label for="logo">Clique aqui para adicionar Logo: </label>
            <input type="file" class="form-control" id="logo" name="logo" value="{{ isset($eventos) ? $eventos->Logo : "" }}">
        </div>

       <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>
@endsection

@section('footer')
@endsection