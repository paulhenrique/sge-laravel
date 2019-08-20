<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a>
        <img class="mr-1" src="{{ asset('images/logo_png_branco.png') }}" width="35" height="35" alt="logo_branco">
    </a>
    <a class="navbar-brand text-white" href="#">
        SgeIF  
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="{{route('listEvent')}}">Mostrar Eventos<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown-menu-right">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
            </li>

        </ul>
    </div>
</nav>