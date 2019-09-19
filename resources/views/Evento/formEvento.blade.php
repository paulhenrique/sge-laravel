@extends('admin.dashboard')



<?php
  if(isset($eventos)){
    $action = route('editar_evento');
    $formulario_title = 'Editar Evento';
  }else{
    $action = route('create_evento');
    $formulario_title = 'Criar Evento';
  }
?>
@section('container-dashboard')
<div id="services-evento">
<div class="box text-left col-md-6 m-auto">

                <div class="card-body row p-0">

                    <div class="col-md-12 p-5">

                    <h1 class="text-center">{{$formulario_title}}</h1>
                    <hr>

  <div class="col-12 m-auto">
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
    <form method="post" action="{{ $action }}" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="idEvento" value="{{ isset($eventos) ? $eventos->idEvento : '' }}">

       <div class="form-group">
         <label for="Nome">Nome Evento: </label>
       <input type="Text" class="form-control" id="Name" name="Nome" value="{{ isset($eventos) ? $eventos->Nome : '' }}" placeholder="Insira um nome para o evento">
       </div>

       <div class="form-group">
         <label for="Apelido">Apelido do Evento: </label>
       <input type="Text" class="form-control" id="Apelido" name="Apelido" value="{{ isset($eventos) ?  : '' }}" placeholder="Insira um apelido curto e sem espaços">
       </div>

        <div class="form-group ">
          <label class="label" for="Responsavel">Responsável: </label>
          <input type="Text" class="form-control " id="Responsavel" name="Responsavel" placeholder="Insira o nome do responsável do evento" value="{{ isset($eventos) ? $eventos->Responsavel : '' }}">
        </div>

        <div class="form-group">
          <label for="CargaHoraria">Carga Horária: </label>
          <input type="number" class="form-control" id="CargaHoraria" name="CargaHoraria" placeholder="Insira o tempo de duração do evento" value="{{ isset($eventos) ? str_replace('H', "", $eventos->CargaHoraria) : '' }}">
        </div>

        <div class="form-group">
          <label for="Local">Local: </label>
          <input type="Text" class="form-control" id="Local" name="Local" placeholder="Insira o local onde ocorrerá o evento" value="{{ isset($eventos) ? $eventos->Local : "" }}">
        </div>

        <div class="form-group">
          <label for="ConteudoProgramatico">Conteúdo Programático: </label>
          <textarea class="form-control" name="ConteudoProgramatico" placeholder="Descreva sucintamente o que ocorrerá durante o evento" id="ConteudoProgramatico">{{ isset($eventos) ? $eventos->ConteudoProgramatico : "" }}</textarea>
        </div>

        <div class="row form-group">
          <div  class="col-6">
          <label for="dtInicio">Data Inicio: </label>
          <input type="date" class="form-control" id="dtInicio" name="DataInicio" placeholder="Insira a data de início do evento" value="{{ isset($eventos) ? $eventos->DataInicio : "" }}">
        </div>
         <div class="col-6">
          <label for="dtFim">Data Fim: </label>
          <input type="date" class="form-control" id="dtFim" name="DataFim" placeholder="Insira a data de encerramento do evento" value="{{ isset($eventos) ? $eventos->DataFim : "" }}">
         </div>
        </div>

        <div class="form-group">
          <label for="dtFim">Data Limite de Inscrição: </label>
          <input type="date" class="form-control" id="dtlimite" name="DataLimiteInscricao" placeholder="Insira a data limite para realização da inscrição " value="{{ isset($eventos) ? $eventos->DataLimiteInscricao : "" }}">
        </div>

         <div class="row form-group">
          <div class="col-6">
          <label for="hrInicio">Horária Inicio: </label>
          <input type="time" class="form-control" id="hrInicio" name="HorarioInicio" placeholder="Insira o horário de início do evento" value="{{ isset($eventos) ? $eventos->HorarioInicio : "" }}">
        </div>
        <div class="col-6">
          <label for="hrFim">Horário Fim: </label>
          <input type="time" class="form-control" id="hrFim" name="HorarioFim" placeholder="Insira o horário de encerramento do evento"  value="{{ isset($eventos) ? $eventos->HorarioFim : "" }}">
        </div>
        </div>



        </div>

        <div class="form-group welcome-left d-flex align-items-center justify-content-center align-self-center">
          <label for="logo"><p class="text-center"><img class="icon" src="{{ asset('images/upload-icon.svg') }}"></p></label>
            <input type="file" class="form-control" id="logo" name="logo" value="{{ isset($eventos) ? $eventos->Logo : "" }}">
        </div>

       <button type="submit" class="btn btn-outline-primary btn-block">Enviar</button>
    </form>
  </div>
                </div>
            </div>
        </div>
</div>

@endsection

