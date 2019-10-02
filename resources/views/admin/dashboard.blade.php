@extends('template.main')

@section('navbar')
  @include('components.navbar')
@endsection

@section('content')
<div class="row container-fluid">
@include('components.sidebar')
  <div class="col-md-12 col-lg-12 mt-2">
  <!-- Page Content -->

          @yield('container-dashboard')
          {{-- <div class="float"><a onclick="window.history.back()" class="float"><i class="fa fa-plus my-float"></i></a>
          </div> --}}
          <div class="fab-container">
                <div class="fab fab-icon-holder">
                        <img class="m-3" src="{{ asset('images/logo_png_branco.png') }}" width="30" height="30" alt="logo_branco">
                </div>
                <ul class="fab-options m-0">
                  <li>
                    <div class="fab-icon-holder">
                        <a class="links_button_admin" href="{{ route('list_evento_admin') }}"><i class="fas fa-clipboard-list"></i> </a>
                    </div>
                    <span class="fab-label"><a class="links_button_admin" href="{{ route('list_evento_admin') }}">Listar eventos</a></span>
                  </li>
                  <li>
                    <div class="fab-icon-holder">
                        <a class="links_button_admin" href="{{ route('todosUsers') }}"><i class="fas fa-users"></i> </a>
                    </div>
                    <span class="fab-label"><a class="links_button_admin" href="{{ route('todosUsers') }}">Listar Usuários</a></span>
                  </li>
                  <li>
                    <div class="fab-icon-holder">

                    <a class="links_button_admin" href="{{ route('showForm_create_evento') }}"><i class="fas fa-plus"></i> </a>

                    </div>
                    <span class="fab-label"><a class="links_button_admin" href="{{ route('showForm_create_evento') }}">Adicionar Eventos </a></span>
                  </li>
                    <li>
                    <div class="fab-icon-holder">

                        <a onclick="window.history.back()" class="links_button_admin"><i class="fas fa-arrow-left"></i> </a>

                    </div>
                        <span class="fab-label"><a class="links_button_admin" onclick="window.history.back()">Voltar </a></span>
                    </li>
                </ul>
  </div>
</div>
@endsection
@section('footer')
@endsection





