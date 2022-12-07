@extends('jotno.jotno_shop.shop_layout.main_frame.master')
@section('content')

    <section style="background-color: darkgreen" class="main-container col1-layout">
        <div class="main container">
            <div style="background-color: #00320f; border-color: #00320f; color: white" class="account-login">
                <div class="page-title">
                    <button style="position: relative; right: -1000px; background-color: #ff7b00; border-color: #ff7b00" id="send2" name="send" type="submit" class="button login"><span>login</span></button>
                    <h2 style="position: relative; right: -440px; color: white">Registration</h2>
                </div>
                <br>
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="col-2 registered-users">
                        <div class="content">
                            <ul class="form-list">
                                <li>
                                    <label for="name">Name <span style="color: yellow" class="required">*</span></label>
                                    <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color: white" type="text" title="Name" class="input-text required-entry @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>
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
                                    <label for="pass">Mobile Number <span style="color: yellow" class="required">*</span></label>
                                    <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color: white" type="text" title="Mobile Number" id="mobile @error('mobile') is-invalid @enderror" class="input-text required-entry" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>
                                <li>
                                    <label for="pass">Password <span style="color: yellow" class="required">*</span></label>
                                    <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color:white " type="password" title="Password" id="password" class="input-text required-entry @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </li>
                                <li>
                                    <label for="pass">Confirm Password <span style="color: yellow" class="required">*</span></label>
                                    <input style="background-color: rgba(23,105,0,0.92); border-color: rgba(23,105,0,0.92); color: white" type="password" title="Confirm Password" id="password-confirm" class="input-text required-entry" name="password_confirmation">
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button style="position: relative; right: -520px; background-color: #00ff12; border-color: #00ff12" id="send2" name="submit" type="submit" class="button login"><span>signup</span></button>
                            </div><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
