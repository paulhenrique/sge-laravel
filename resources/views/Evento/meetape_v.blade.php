@extends('template.main')

@section('color-bg')
background-image-solid
@endsection


@section('navbar')
@include('components.navbar')
@endsection

@section('footer')
@include('components.footer')
@endsection

@section('content')
<div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success col-12">
        {{ session()->get('success') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger col-12">
        {{ session()->get('error') }}
    </div>
    @endif
    <section class="">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img class="img-fluid mt-2 pl-1 m-auto" src="{{ url("/storage/{$eventos->Logo}") }}">
            </div>
            <div class="align-self-center col-lg-6 col-md-6 col-sm-12 text-center hero-text">
                <strong>
                    <p class="">
                        {{$eventos->Nome}}
                    </p>
                </strong>
                <p class=""> Está Chegando!<br>
                    <span id="dia"></span> : <span id="hora"></span> : <span id="minuto"></span> : <span id="segundo"></span>
                </p>
                @if($eventos->inscrito == false)
                <h2 class="text-center"><a class="btn btn-outline-success " href="{{ route('inscrever_user_evento',['idEvento' => $eventos->idEvento]) }}" role="button">Inscrever-se</a></h2>
                @else
                <h2 class="text-center"><a class="btn btn-outline-danger " href="{{ route('desinscrever',['idEvento' => $eventos->idEvento]) }}" role="button">Desinscrever-se</a></h2>
                @endif
                <p class="lead text-center">
                    <strong>Inscrições até: {{ date("d/m/Y", strtotime($eventos->DataLimiteInscricao)) }}</strong>
                </p>
                <input type="hidden" name="DataInicio" value="{{$eventos->DataInicio}}">
            </div>
        </div>
    </section>
    <section class="about">
        <h1 class="text-center section-title"> Sobre </h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p class="text-justify text-section align-self-center">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi voluptatem mollitia qui error praesentium voluptate beatae aspernatur saepe accusantium enim ipsam quas sint nobis, obcaecati libero quia at repellat odio. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum quas, illum nobis, officiis, perferendis expedita autem doloribus vel suscipit aperiam delectus numquam adipisci aspernatur. Ullam voluptates ab reiciendis ipsa nisi!
                </p>
            </div>
            <div class="col-sm-12 col-md-6 align-self-center mb-5">
                <img src="{{ asset('images/img-about.svg') }}" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="activity bg-purple">
        <h1 class="text-center section-title text-white"> Atividades </h1>
        <div class="row">
            @if (count($atividades) > 0)
            @foreach ($atividades as $atividade)
            <div class="col-6 col-md-4">
                <div class="form-box">
                    @if ($atividade->CondicaoAtividade == "Ativado")
                    <div class="card-body bg-light mb-3 ml-1 mr-1">
                        <h4 class="card-title text-center"><?php echo ucfirst($atividade->nomeAtividade) ?></h4>
                        <hr id="list_hr">
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Início: </strong> {{ date("d/m/Y", strtotime($atividade->DataInicio)) }} <strong> às </strong> {{$atividade->HoraInicio}} <strong> <br>Término: </strong>{{ date("d/m/Y", strtotime($atividade->DataTermino)) }} <strong> até</strong> {{$atividade->HoraTermino}} </small></p>
                        <div class="row text-center justify-content-center">
                            @if($atividade->inscrito == false)
                            <p class=""><a class="btn btn-outline-success" href="{{ route('inscrever_user_atividade',['idAtividade' => $atividade->idAtividade, 'idEvento' => $eventos->idEvento]) }}" role="button">Inscrever-se</a></p>
                            @else
                            <p class=""><a class="btn btn-outline-danger" href="{{ route('desinscrever_user_atividade',['idAtividade' => $atividade->idAtividade, 'idEvento' => $eventos->idEvento]) }}" role="button">Desinscrever-se</a></p>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>

    <section class="panelist">
        <h1 class="text-center section-title "> Palestrantes </h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    @if (isset($palestrantes))
                    @foreach ($palestrantes as $palestrante)
                    <div class="col-sm-12 col-md-6 mb-2">
                        <div class="form-box">
                            <div class="card-body">
                                <h4 class="card-title text-center"><?php echo ucfirst($palestrante->name) ?></h4>
                                <hr id="list_hr">
                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i><strong> Email: </strong>{{$palestrante->email}}</small></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6 align-self-center mb-5">
                <img src="{{ asset('images/img-panelist.svg')}}" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="place bg-purple mb-4">
        <h1 class="text-center section-title text-white"> Local do Evento </h1>
        <div class="row">
            <div class="col-sm-12 col-md-6 align-self-center mb-5">
                <img src="{{ asset('images/img-event-locale.svg') }}" class="img-fluid">
            </div>
            <div class="col-sm-12 col-md-6 event-adress text-section">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.2931471902366!2d-48.02073778506283!3d-23.593817384666867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cbf41ebfcf31%3A0xa65e4fb6d75446bf!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20de%20S%C3%A3o%20Paulo%2C%20Campus%20Itapetininga!5e0!3m2!1spt-BR!2sbr!4v1585933087747!5m2!1spt-BR!2sbr" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <p class="text-white">{{$eventos->Local}}</p>
            </div>
        </div>
    </section>
</div>


@endsection
