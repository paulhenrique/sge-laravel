@extends('template.main')

@section('navbar')
@endsection

@section('content')
<div class="container-fluid">
  <h1 class="text-center">Cadastrar Evento</h1>
  <div class="col-6 m-auto">
    <form method="post" action="{{ route('create_evento') }}" >

        @csrf
        
       <div class="form-group">
         <label for="Nome">Nome Evento: </label>
         <input type="Text" class="form-control" id="Name" name="nome">
       </div>

        <div class="form-group">
          <label for="Responsavel">Responsável: </label>
          <input type="Text" class="form-control" id="Responsavel" name="responsavel">
        </div>
        
        <div class="form-group">
          <label for="CargaHoraria">Carga Horária: </label>
          <input type="Text" class="form-control" id="CargaHoraria" name="cargaHoraria">
        </div>
        
        <div class="form-group">
          <label for="Local">Local: </label>
          <input type="Text" class="form-control" id="Local" name="local">
        </div>

        <div class="form-group">
          <label for="ConteudoProgramatico">Conteúdo Programático: </label>
          <textarea class="form-control" name="ConteudoProgramatico" id="ConteudoProgramatico"></textarea>
        </div>

        <div class="form-group">
          <label for="dtInicio">Data Inicio: </label>
          <input type="date" class="form-control" id="dtInicio" name="dtInicio">
        </div>
        
        <div class="form-group">
          <label for="dtFim">Data Fim: </label>
          <input type="date" class="form-control" id="dtFim" name="dtFim">
        </div>

        <div class="form-group">
          <label for="dtFim">Data Limite de Inscrição: </label>
          <input type="date" class="form-control" id="dtlimite" name="dtlimite">
        </div>

        <div class="form-group">
          <label for="hrInicio">Horária Inicio: </label>
          <input type="time" class="form-control" id="hrInicio" name="hrInicio">
        </div>
        
        <div class="form-group">
          <label for="hrFim">Horário Fim: </label>
          <input type="time" class="form-control" id="hrFim" name="hrFim">
        </div>

        <div class="form-group">
            <label for="hrFim">Logo: </label>
            <input type="text" class="form-control" id="logo" name="logo">
        </div>

       <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>
@endsection

@section('footer')
@endsection