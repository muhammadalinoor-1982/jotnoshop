@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')

    <section style="background-color: darkgreen" class="main-container col1-layout">
        <div class="main container">
            <div style="position: relative; left: 400px; top: 35px; background-color: #00320f; border-color: #00320f; border-radius: 10px; color: white" class="account-login col-md-6">
                <div class="page-title">
                    <a href="{{ route('register.view') }}">
                        <button style="position: relative; left: 670px; background-color: #ff7b00; border-color: #ff7b00" id="send2" name="send" type="submit" class="button login"><span>Signup</span></button>
                    </a>
                    <h2 style="position: relative; right: -170px; color: white">Please Verify Yourself</h2>
                </div>
                <br>
                <form action="{{route('verify.email.code.store')}}" method="post">
                    @csrf
                    @if(Session::get('message'))
                        <strong>{{Session::get('message')}}</strong>
                    @endif
                    <div class="col-2 registered-users">
                        <div class="content">
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email Address <span style="color: yellow" class="required">*</span></label>
                                    <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color: white" type="email" title="Email Address" class="input-text required-entry @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>
                                <li>
                                    <label for="Verification Code">Verification Code <span style="color: yellow" class="required">*</span></label>
                                    <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color: white" type="text" title="Verification Code" id="verification_code" class="input-text required-entry validate-verification-code @error('verification_code') is-invalid @enderror" name="verification_code" required autocomplete="verification_code" placeholder="verification_code">
                                    @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button style="position: relative; right: -350px; bottom: -10px; background-color: #00ff12; border-color: #00ff12" id="send2" name="submit" type="submit" class="button login"><span>Verify</span></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection



{{--<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title)?$title:config('app.name') }}</title>
</head>
<body>
<form class="form-inline" action="{{route('verify.email.code.store')}}" method="post">
    @csrf
    @if(Session::get('message'))
        <strong>{{Session::get('message')}}</strong>
    @endif
    <br>
    <div class="form-group">
        <label class="col-md-6">Email</label>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control form-control-line @error('email') is-invalid @enderror" placeholder="Email">
        </div>
        @error('email')
        <div class="pl-1 text-danger">{{ $message }}</div>
        @enderror
    </div><br>

    <div class="form-group">
        <label class="col-md-6">Verification Code</label>
        <div class="col-md-6">
            <input type="text" name="verification_code" class="form-control form-control-line @error('verification_code') is-invalid @enderror" placeholder="verification_code">
        </div>
        @error('verification_code')
        <div class="pl-1 text-danger">{{ $message }}</div>
        @enderror
    </div><br>

    <button type="submit" name="submit" value="submit" class="btn btn-primary">Verify</button><br>
</form>
</body>
</html>--}}
