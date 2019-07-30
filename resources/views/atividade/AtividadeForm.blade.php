@extends('template.main')

@section('navbar')
@endsection

<?php 
  if(isset($atividade)){
    $action = route('editar_atividade');
  }else{
    $action = route('create_atividade');
  }
?>
@section('content')
<div class="container-fluid">
  <h1 class="text-center">Cadastrar atividade</h1>
  <div class="col-6 m-auto">
    <form method="post" action="{{ $action }}" >

        @csrf

      <input type="hidden" name="idEvento" value="{{ isset($atividade) ? $atividade->idAtividade : '' }}">

       <div class="form-group">
            <label for="Nome">Nome atividade: </label>
            <input type="Text" class="form-control" id="Name" name="nome" value="">
       </div>

       <div class="form-group">
          <label for="Nome">Evento: </label>
          <select class="form-control" name="idEvento">
              @foreach($eventos as $evento)
                <option value="{{ $evento->idEvento }}">{{ $evento->Nome }}</option>
              @endforeach
          </select>
       </div>

        <div class="form-group">
          <label for="Tipo">Tipo de Atividade: </label>
          <input type="Text" class="form-control" id="Tipo" name="tipo" value="">
        </div>

        <div class="form-group">
          <label for="dtInicio">Data Inicio: </label>
          <input type="date" class="form-control" id="dtInicio" name="dtInicio" value="{{ isset($atividade) ? $atividade->DataInicio : "" }}">
        </div>
        
        <div class="form-group">
          <label for="dtFim">Data Fim: </label>
          <input type="date" class="form-control" id="dtFim" name="dtFim" value="{{ isset($atividade) ? $atividade->DataFim : "" }}">
        </div>

        <div class="form-group">
          <label for="limiteParticipantes">Número Máximo de Participantes: </label>
          <input type="number" class="form-control" id="limiteParticipantes" name="limiteParticipantes" value="">
        </div>
      
        <div class="form-group">
          <label for="hrInicio">Horária Inicio: </label>
          <input type="time" class="form-control" id="hrInicio" name="hrInicio" value="{{ isset($atividade) ? $atividade->HorarioInicio : "" }}">
        </div>

        <div class="form-group">
          <label for="hrFim">Horário Fim: </label>
          <input type="time" class="form-control" id="hrFim" name="hrFim" value="{{ isset($atividade) ? $atividade->HorarioFim : "" }}">
        </div>
        
        <div class="form-group">
          <label for="local">Local: </label>
          <input type="Text" class="form-control" id="local" name="local" value="">
        </div>

       

       <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>
@endsection

@section('footer')
@endsection

