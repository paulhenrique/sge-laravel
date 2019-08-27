
@extends('template.main')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <section id="intro" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-10 text-left intro-info order-md-first order-last">
                    <h1>Soluções Rapidas<br>para seus <span>Eventos!</span></h1>
                    <div>
                       <p class="text-left"><a href="{{ route('listEvent') }}" class="btn btn-dark">Iniciar</a></p>
                    </div>
                </div>

                <div class="col-md-2 intro-img order-md-last order-first">
                    <img src="{{asset('images/logo_png_dark.png')}}" alt="logo_sge" class="img-fluid mt-2 img-welcome">
                </div>
            </div>

        </div>
    </section>

    <main id="main">

        <section id="services" class="section-bg">
            <div class="container">

                <header class="section-header text-center mb-2">
                    <h3>Sobre o SGE</h3>
                    <p>Descubra um pouco sobre o nosso projeto.</p>
                </header>

                <div class="row">

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">                            
                                <img src="{{asset('images/undraw_newspaper_k72w.svg')}}" alt="logo_sge" class="mb-1 svg-classe">
                            <h4 class="title"><a href="">Explore</a></h4>
                            <p class="description text-justify">Explore e descubra novos eventos e amplie seu horizonte atraves de nosso sistema de organização.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                                <img src="{{asset('images/undraw_segment_analysis_bdn4.svg')}}" alt="logo_sge" class="mb-1 svg-classe">
                            <h4 class="title"><a href="">Crie</a></h4>
                            <p class="description text-justify">Crie seus eventos e descubra uma nova maneira de se relacionar com o seu publico alvo.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="box">
                                <img src="{{asset('images/undraw_selecting_1lx3.svg')}}" alt="logo_sge" class="mb-1 svg-classe">
                            <h4 class="title"><a href="">Organize</a></h4>
                            <p class="description text-justify creditos">Obtenha uma melhor organização e agilidade na comunicação dos eventos em que você criou e esta interessado.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection
        @section('footer') @include('components.footer') @endsection