@extends('template.main')
@section('color-bg')
 background-image
@endsection

@section('content')
@section('navbar')
	@include('components.navbar')
@endsection
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card form-box">
                <div class="card-body row p-0">
                    <div class="col-md-12 p-5">
                        <div class="circle div-darkblue mx-auto">
                            <i class="material-icons font-white">account_circle</i>
                        </div>
                        <h2 class="text-center">Registrar-se</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <input id="CPF" type="text" class="form-control @error('CPF') is-invalid @enderror" name="CPF" placeholder="CPF" value="{{ old('CPF') }}" data-mask="000.000.000-00" required autocomplete="email">

                                    @error('CPF')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-outline-dark col-12">
                                        {{ __('Cadastrar-se') }}
                                    </button>
                                </div>
                            <div class="text-center col-md-12">
                             <a class="btn btn-link text-center mt-1" href="{{route('login')}}"> Possui Conta? Entre </a>
                             </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="float "><a href="{{route('welcome')}}" class="float"><i class=""></i></a>
    </div>
</div>
@endsection
