@extends('template.main')

@section('navbar')
@include('components.navbar')
@endsection

@section('content')
<script>
    window.onload = () => {
        const fabs = document.getElementById("fab");
        const faboptions = document.querySelectorAll('.fab-options');
        fabs.addEventListener('click', () => {
            fabs.classList.add('clicado');

            faboptions.forEach((li, index) => {
                li.style.display = "block";
                li.style.opacity = "0.8";
                li.style.transition = ".6s";

            });
        });
        fabs.addEventListener('click', (fabs) => {
            if (fabs.srcElement.classList.contains('clicado') == true) {
                faboptions.forEach((li, index) => {
                    li.style.display = "none";
                });
            }
        })
    }
</script>
<div class="row container-fluid">
    @include('components.sidebar')
    <div class="col-md-12 col-lg-12 mt-2">
        <!-- Page Content -->

        @yield('container-dashboard')
        @can("isAdmin")

        <div class="fab-container">
            <div id="fab" class="fab fab-icon-holder">
                <img id="fab-image" class="m-3 fab-image" src="{{ asset('images/logo_png_branco.png') }}" width="30" height="30" alt="logo_branco">
            </div>
            <ul class="fab-options m-0">
                <li>
                    <div class="fab-icon-holder">
                        <a class="links_button_admin" href="{{ route('form_template') }}"><i class="fas fa-code"></i> </a>
                    </div>
                    <span class="fab-label"><a class="links_button_admin" href="{{ route('list_template') }}">Cadastrar Template</a></span>
                </li>
                <li>
                    <div class="fab-icon-holder">
                        <a class="links_button_admin" href="{{ route('listar_atividades_em_analise') }}"><i class="fas fa-clipboard-list"></i> </a>
                    </div>
                    <span class="fab-label"><a class="links_button_admin" href="{{ route('listar_atividades_em_analise') }}">Atividades Pendentes</a></span>
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
        @endcan
    </div>
    @endsection
    @section('footer')
    @endsection
