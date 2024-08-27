@extends('layouts.panel')

@section('content')

    <section class="login-section">
        <div class="login-left-form__wrap">
            <div class="login-left-form">
                <a href="#" class="login-logo">
                    <img src="{{ asset('img/aph-logo.png') }}" alt="logo" width="300">
                </a>
                <form method="POST" action="{{route('panel.auth.login')}}">
                    @csrf
                    <div class="form-col">
                        <label for="email">{{ __('E-mail') }}</label>
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" placeholder="Wpisz" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-col">
                        <label for="password">{{ __('Hasło') }}</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password" placeholder="Wpisz">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-col-btn">
                        <div class="form-col-btn__wrap text-center">
                            <button type="submit" class="btn btn-blue">
                                {{ __('Zaloguj się') }}
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
        <div class="login-right-image__wrap">
            <h1 class="admin-panel-h1">Panel Administratora - Connector</h1>
        </div>
    </section>

@endsection
