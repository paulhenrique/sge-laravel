  @extends('admin.dashboard')


  <?php
    if (isset($atividades)) {
        $action = route('editar_atividade');
    } else {
        $action = route('create_atividade');
    }
    ?>
  @section('container-dashboard')
  <section id="services-form" class="section-bg">
      <div class="form-box col-md-7 col-sm-12 m-auto">
          <div class="box-body row p-0">
              <div class="col-md-12 p-5">
                  <h1 class="text-center">Cadastrar Atividade</h1>
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

                      <form method="post" action="{{ $action }}">
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
                                @if ($ev->CondicaoEvento == "Ativado")
                                @can("isAdmin")
                                  <option value="{{ isset($ev) ? $ev->idEvento : '' }}">{{$ev->Nome}}</option>
                                @endcan

                                @cannot("isAdmin")
                                @if($ev->CondicaoCadastroDeAtividade == "Sim")
                                  <option value="{{ isset($ev) ? $ev->idEvento : '' }}">{{$ev->Nome}}</option>
                                @endif
                                @endcannot
                                @endif
                            @endforeach
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="Tipo">Tipo de Atividade: </label>
                              <input type="Text" class="form-control" id="Tipo" name="tipo" value="{{ isset($atividades) ? $atividades->tipo : '' }}">
                          </div>

                          <div class="form-group input_fields_wrap">
                              <label for="Descricao">Descrição da atividade: </label>
                              <textarea class="form-control" id="Descricao" name="Descricao"> {{ isset($atividades) ? $atividades->Descricao : '' }}</textarea>
                          </div>

                          <div class="row form-group">
                              <div class="col-md-6 col-sm-12">
                                  <label for="dtInicio">Data Inicio: </label>
                                  <input type="text" data-mask="00/00/0000" class="form-control" id="dtInicio" name="DataInicio" value="{{ isset($atividades) ? date('d/m/Y', strtotime($atividades->DataInicio))  : '' }}">
                              </div>
                              <div class="col-md-6 col-sm-12">
                                  <label for="dtFim">Data Fim: </label>
                                  <input type="text" data-mask="00/00/0000" class="form-control" id="dtFim" name="DataTermino" value="{{ isset($atividades) ? date('d/m/Y', strtotime($atividades->DataTermino)) : '' }}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="limiteParticipantes">Número Máximo de Participantes: </label>
                              <input type="number" class="form-control" id="limiteParticipantes" name="NumMaxParticipantes" value="{{ isset($atividades) ? $atividades->NumMaxParticipantes : '' }}">
                          </div>
                        
                          <div class="form-group">
                              <label for="NomePalestrante">Nome do Palestrante: </label>
                              <input type="Text" class="form-control" id="NomePalestrante" name="NomePalestrante" value="{{ isset($atividades) ? $atividades->NomePalestrante : '' }}">
                          </div>
                          
                          <div class="form-group">
                              <label for="DadosPalestrante">Dados do Palestrante: </label>
                              <textarea maxlength="255" class="form-control" id="DadosPalestrante" name="DadosPalestrante" placeholder="Faça um resumo com no máximo 255 caracteres sobre os dados do palestrante (Formação, Local de Trabalho, etc.)">{{ isset($atividades) ? $atividades->DadosPalestrante : '' }}</textarea>
                          </div>

                          <div class="row form-group">
                              <div class="col-md-6 col-sm-12">
                                  <label for="hrInicio">Horária Inicio: </label>
                                  <input type="time" class="form-control" id="hrInicio" name="HoraInicio" value="{{ isset($atividades) ? $atividades->HoraInicio : '' }}">
                              </div>
                              <div class="col-md-6 col-sm-12">
                                  <label for="hrFim">Horário Final: </label>
                                  <input type="time" class="form-control" id="hrFim" name="HoraTermino" value="{{ isset($atividades) ? $atividades->HoraTermino : '' }}">
                              </div>
                          </div>
                        @can("isAdmin")
                          <div class="form-group">
                              <label for="local">Local: </label>
                              <input type="Text" class="form-control" id="local" name="local" value="{{ isset($atividades) ? $atividades->local : '' }}">
                          </div>
                        @endcan
                        @can("isParticipante")
                        <input type="hidden" name="local" value="{{ isset($atividades) ? $atividades->idAtividade : 'Local em Analise' }}">
                        @endcan

                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                      </form>
                  </div>
  </section>
  </div>
  </div>
  </div>

  @endsection
