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
    <nav class="mt-3">
        <div class="nav nav-tabs ml-1" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active link_form" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dados Gerais</a>
            <a class="nav-item nav-link link_form" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Alterar Dados</a>
            <a class="nav-item nav-link link_form" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Eventos Inscritos</a>
        </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    <section id="services-evento" class="mt-0">
                <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="box text-left row">
                      <div class="col-lg-6">
                        <label> Nome: </label>
                        <h3 class="text-capitalize">{{$user->name}} </h3>
                      </div>
                      <div class="col-lg-6">
                        <label> Email: </label>
                      <h3 class="text-capitalize">{{$user->email}}</h3>
                    </div>
                    <div class="col-lg-6">
                        <label> CPF:</label>
                    <h3>{{$user->CPF}}</h3>
                    </div>
                    <div class="col-lg-6">
                        <label> Senha:</label>
                        <h3>********</h3>
                        </div>
                    </div>
                </div>
                </div>

        </section>

        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

        <section id="services-evento" class="mt-0">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                <form action="{{ route('edit_account')}}" method="post">
                        @csrf
                    <div class="box text-left row">
                        <div class="col-lg-6">
                        <label for="name"> Nome: </label>
                        {{-- <h3 class="text-capitalize">Joao victor Ferreira de Morais </h3> --}}
                        <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <label for="email"> Email: </label>
                        {{-- <h3 class="text-capitalize">email@joao.com</h3> --}}
                        <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="cpf"> CPF:</label>
                        {{-- <h3>123.123.123-1</h3> --}}
                        <div class="form-group">
                        <input type="text" name="CPF" id="cpf" class="form-control" data-mask="000.000.000-00" value="{{$user->CPF}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <label for="senha"> Senha:</label>
                            {{-- <h3>123.123.123-1</h3> --}}
                            <div class="form-group">
                            <input type="password" name="password" id="senha" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 mt-1">
                            <div class="form-group">
                            <button type="button" class="btn btn-warning form-control"> Alterar Dados </button>
                            </div>
                            <a data-toggle="modal" data-target="#exampleModal"><button type="button" class="btn btn-danger form-control"> Excluir conta </button></a>
                            </div>
                    </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir Conta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente excluir sua conta permanentemente? A ação não poderá ser desfeita.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a href="{{route('delete_account')}}"><button type="button" class="btn btn-danger">Excluir Conta</button></a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row">
                @if(count($eventos)==0)
                    <div class="col-md-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h1>Você ainda não participou de evento algum!!</h1>
                                <!-- Permitir exbição somente para Admins -->
                                <p>Clique aqui para vizualizar os <a class="link_form" href="{{route('listEvent')}}"><strong> eventos disponíveis</strong></a><p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($eventos as $evento)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-xl-4 col-lg-4 p-2" id="services-evento">
                            <div class="box ">
                            @if ($evento->CondicaoEvento == "Ativado")

                            <img src="{{ url("/storage/{$evento->Logo}") }}" class="img-fluid list_image" alt="logo_do_evento.{{$evento->Nome}}">
                                <div class="card-body">
                                    <h4 class="card-title text-center"><?php echo ucfirst($evento->Nome) ?></h4>
                                    <hr id="list_hr">
                                    <div class="row text-center">
                                        <a class="col-md-4 col-sm-6 col-xl-4 links mx-auto" href="{{ route('showEvent',['Apelido' => $evento->Apelido]) }}"><img src="{{ asset('images/search.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Visualizar</figcaption></a>
                                        {{-- <a class="col-md-4 col-sm-6 col-xl-4 links" href="{{ route('GerarPDF')}}"><img src="{{ asset('images/diploma.svg') }}" class="img-fluid text-center button list_svg"><figcaption>Gerar Certificado</figcaption></a> --}}
                                    </div>
                                </div>
                            @else
                            <div class="desativado">
                                <img src="{{ url("/storage/{$evento->Logo}") }}" class="img-fluid list_image" alt="logo_do_evento.{{$evento->Nome}}">
                                <div class="card-body ">
                                        <h4 class="card-title text-center "><?php echo ucfirst($evento->Nome) ?></h4>
                                        <hr id="list_hr">
                                        <h4 class="text-center">Evento Indisponível</h4>

                                </div>
                            </div>
                            @endif
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>

        </div>
        </div>
</div>

</div>



@endsection
