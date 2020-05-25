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
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success col-12">
        {{ session()->get('success') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger col-12">
        {{ session()->get('error') }}
    </div>
    @endif
    <section class="hero">
        <div class="row">
            <div class="col-md-6 col-sm-12 ">
                <img class="img-fluid mt-2" src="{{ url("/storage/{$eventos->Logo}") }}">
            </div>
            <div class="align-self-center col-lg-6 col-md-6 col-sm-12 text-center hero-text">
                <p class=""> Está Chegando!<br>
                    <span id="dia"></span> : <span id="hora"></span> : <span id="minuto"></span> : <span id="segundo"></span>
                </p>
                <input type="hidden" name="DataInicio" value="{{$eventos->DataInicio}}">
            </div>
        </div>
    </section>
    <section class="about mt-5">
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

    <section class="acitivity">
        <h1 class="text-center section-title"> Atividades </h1>
        <div class="row">
            @foreach ($atividades as $atividade)
            <div class="col-sm-12 col-md-3 col-lg-4">
                <div class="form-box">
                    @if ($atividade->CondicaoAtividade == "Ativado")
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo ucfirst($atividade->nomeAtividade) ?></h4>
                        <hr id="list_hr">
                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <strong> Início: </strong> {{ date("d/m/Y", strtotime($atividade->DataInicio)) }} <strong> às </strong> {{$atividade->HoraInicio}} <strong> <br>Término: </strong>{{ date("d/m/Y", strtotime($atividade->DataTermino)) }} <strong> até</strong> {{$atividade->HoraTermino}} </small></p>
                        <div class="row text-center">
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
        </div>
    </section>

    <section class="panelist">
        <h1 class="text-center section-title"> Palestrantes </h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-box">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <img src="{{ asset('images/img-panelist.svg')}}" class="img-fluid">
            </div>
        </div>
    </section>
</div>


@endsection
