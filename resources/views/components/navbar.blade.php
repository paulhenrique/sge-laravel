
<nav class="navbar navbar-expand-lg navbar-expand-md  navbar-light bg-dark ">
    <a href="{{route('welcome')}}"><img class="mr-1 logo-branco-nav " src="{{ asset('images/logo_png_branco.png') }}" width="35" height="35" alt="logo_branco"> </a>
    </a>
    <a class="navbar-brand font-weight-bold " href="{{ route('welcome') }}">
        <span class="text-blue">SGEIFSP</span>
    </a>
    <button class="navbar-toggler btn-toggler-navbar" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        {{-- <span class=""></span> --}}
        <span class="btn-navbar-toggler"><i class="fas fa-bars fa-1x"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('listEvent')}}"><span class=" text-nav">Mostrar Eventos</span><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                    @can("isAdmin")
                        <a class=" nav-link" href="{{ route('list_evento_admin') }}"><span class="text-nav">Painel de Controle</span><span class="sr-only">(current)</span></a>

                    @endcan
                </li>
            @if( Auth::user())
                <li class="nav-item dropdown-menu-right">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   <span class="text-nav text-uppercase"> {{ Auth::user()->name }} </span>
                    </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('account')}}"> Conta</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @can('isAdmin')
                            <a class="dropdown-item" href="{{ route('todosUsers')}}">
                                Listar Usuários
                            </a>
                            @endcan
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Sair') }}
                            </a>
                        </div>

                </li>
            @else
                <li class="nav-item active">
                    <a class="nav-link " href="{{route('login')}}"><span class="text-nav">Login</span><span class="sr-only">(current)</span></a>

                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('register')}}"><span class="text-nav">Registrar<span class="sr-only">(current)</span></a>

                </li>


            @endif

        </ul>
    </div>
</nav>
