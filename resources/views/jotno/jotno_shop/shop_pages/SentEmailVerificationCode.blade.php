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
    <h1>Email: {{$email}}</h1>
    <h1>Email Verification Code: {{$verification_code}}</h1>
    <h1>This is your Email and Verification Code</h1>
</body>
</html>
