@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')

    <section style="background-color: darkgreen" class="main-container col1-layout">
        <div class="main container">
            <div style="position: relative; left: 400px; top: 35px; background-color: #00320f; border-radius: 10px; border-color: #00320f; color: white" class="account-login col-md-6">
                <div class="page-title">
                    <a href="{{ route('register.view') }}">
                    <button style="position: relative; left: 670px; background-color: #ff7b00; border-color: #ff7b00" id="send2" name="send" type="submit" class="button login"><span>Signup</span></button>
                    </a>
                    <h2 style="position: relative; right: -270px; color: white">Login</h2>
                </div>
                <br>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="col-2 registered-users">
                    <div class="content">
                        <ul class="form-list">
                            <li>
                                <label for="email">Email Address <span style="color: yellow" class="required">*</span></label>
                                <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color: white" type="email" title="Email Address" class="input-text required-entry @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </li>
                            <li>
                                <label for="pass">Password <span style="color: yellow" class="required">*</span></label>
                                <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color: white" type="password" title="Password" id="password" class="input-text required-entry validate-password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </li>
                        </ul>
                        <div class="buttons-set">
                            <button style="position: relative; right: -350px; bottom: -20px; background-color: #00ff12; border-color: #00ff12" id="send2" name="submit" type="submit" class="button login"><span>Login</span></button>
                        </div><br>
                        <div class="buttons-set">
                            @if (Route::has('password.request'))
                                <a style="position: relative; left: 600px; color: yellow" class="forgot-word" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            @endif
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection





{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

--}}
