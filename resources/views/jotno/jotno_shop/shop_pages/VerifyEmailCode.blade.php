<!doctype html>
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
</html>
