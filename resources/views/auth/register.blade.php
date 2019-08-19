@extends('template.main')
@section('color-bg')
 background-image
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center m-5">
        <div class="col-md-6">
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
                                    <input id="CPF" type="text" class="form-control @error('CPF') is-invalid @enderror" name="CPF" placeholder="CPF" value="{{ old('CPF') }}" required autocomplete="email">
    
                                    @error('CPF')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-dark col-12">
                                        {{ __('Cadastrar-se') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
