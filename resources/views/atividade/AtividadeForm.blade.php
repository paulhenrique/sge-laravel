@extends('template.main')

@section('navbar')
@endsection

<?php 
  //dd($atividades);
  if(isset($atividades)){
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

      <input type="hidden" name="idAtividade" value="{{ isset($atividades) ? $atividades->idAtividade : '' }}">

       <div class="form-group">
            <label for="Nome">Nome atividade: </label>
            <input type="Text" class="form-control" id="Name" name="nomeAtividade" value="{{ isset($atividades) ? $atividades->nomeAtividade : '' }}">
       </div>

       <div class="form-group">
          <label for="Nome">Evento: </label>
          <select class="form-control" name="idEvento">
              @foreach($evento as $ev)
                  <option value="{{ isset($ev) ? $ev->idEvento : '' }}">{{$ev->Nome}}</option>
              @endforeach
          </select>
       </div>

        <div class="form-group">
          <label for="Tipo">Tipo de Atividade: </label>
          <input type="Text" class="form-control" id="Tipo" name="tipo" value="{{ isset($atividades) ? $atividades->tipo : '' }}">
        </div>

        <div class="form-group">
          <label for="dtInicio">Data Inicio: </label>
          <input type="date" class="form-control" id="dtInicio" name="dtInicio" value="{{ isset($atividades) ? $atividades->DataInicio : '' }}">
        </div>
        
        <div class="form-group">
          <label for="dtFim">Data Fim: </label>
          <input type="date" class="form-control" id="dtFim" name="dtFim" value="{{ isset($atividades) ? $atividades->DataTermino : '' }}">
        </div>

        <div class="form-group">
          <label for="limiteParticipantes">Número Máximo de Participantes: </label>
          <input type="number" class="form-control" id="limiteParticipantes" name="limiteParticipantes" value="">
        </div>
      
        <div class="form-group">
          <label for="hrInicio">Horária Inicio: </label>
          <input type="time" class="form-control" id="hrInicio" name="hrInicio" value="{{ isset($atividades) ? $atividades->HoraInicio : '' }}">
        </div>

        <div class="form-group">
          <label for="hrFim">Horário Fim: </label>
          <input type="time" class="form-control" id="hrFim" name="hrFim" value="{{ isset($atividades) ? $atividades->HoraTermino : '' }}">
        </div>
        
        <div class="form-group">
          <label for="local">Local: </label>
          <input type="Text" class="form-control" id="local" name="local" value="{{ isset($atividades) ? $atividades->local : '' }}">
        </div>

       

       <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>
@endsection

@section('footer')
@endsection

