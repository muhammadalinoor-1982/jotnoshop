@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')

    <section style="background-color: darkgreen" class="main-container col1-layout">
        <div class="main container">
            <div style="background-color: #00320f; border-color: #00320f; color: white" class="account-login">
                <div class="page-title">
                    <a href="{{ route('register.view') }}">
                        <button style="position: relative; right: -1000px; background-color: #ff7b00; border-color: #ff7b00" id="send2" name="send" type="submit" class="button login"><span>Signup</span></button>
                    </a>
                    <h2 style="position: relative; right: -440px; color: white">Reset Password</h2>
                </div>
                <br>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                            </ul>
                            <div class="buttons-set">
                                <button style="position: relative; right: -520px; background-color: #00ff12; border-color: #00ff12" id="send2" name="submit" type="submit" class="button login"><span>Send Password Reset Link</span></button>
                            </div><br>
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
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
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
