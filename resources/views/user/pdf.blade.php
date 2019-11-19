@extends('template.main')

<div class="container">
{{-- atividades, eventos --}}
@php
    function dia($data){
            list($dt, $hora) = explode(" ", $data);
            list($ano,$mes,$dia) = explode("-", $dt);
        return $dia;
    }

    $meses=array('', 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro');
    //echo $mes[date('m')];
    $dia = date('d');
    $mes = $meses[date('m')];
    $ano = date('Y');
@endphp
@foreach ($eventos as $evento)
    <div class="m-auto">
            <div class="mb-4">
        <img src="{{ asset('images/ifsp_logo.png') }}" width="60%" >


        <img class="float-right ml-4" src="{{ asset('images/logo_png_branco_logo.png') }}" width="20%">
            </div>

        <h1 class="card-title text-center certificado">Certificado</h1>

        <p class="text-justify">
            <span class="paragrafo">
            <i>Certificamos que</i> <strong class= "text-capitalize">{{$evento->name}}</strong>
            <i>participou das seguintes atividades:</i> </span>
            @foreach ($atividades as $atividade)
                <strong class= "text-capitalize">{{$atividade->nomeAtividade}}</strong>,
            @endforeach
            <i>no evento</i> <strong class= "text-capitalize">{{$evento->Nome}}</strong>
            <i>realizado nos dias {{$data = dia($evento->DataInicio)}} à {{$data = dia($evento->DataFim)}}, nas dependências do Instituto Federal de Educação, Ciência e Tecnologia de São Paulo - Câmpus Itapetininga.</i>
        </p>


        <p class="text-right">
            <i>{{"Itapetininga, $dia de $mes de $ano."}}</i>
        </p>

        <div class="assinaturas text-left">
            <div class="text-center">
                <img src="{{ asset("images/assinatura.png")}}" height="150px" width="300px">
                <p class="rafael"> <strong>Rafael de Almeida Brochado </strong></p>
                <span > Coordenadoria do Curso de Informática</span>
            </div>
        </div>
    </div>
@endforeach
</div>

