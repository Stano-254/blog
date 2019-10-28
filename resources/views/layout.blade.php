<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('css/app.css')}}" rel="stylesheet">
        <title> @yield('title','Welcome to laravel 5.8')</title>
</head>
<body>
<div class="container">
   @include('nav')
    @if(session()->has('message'))
    <div class=" alert alert-success" role="alert">
        <strong>Success</strong>{{session()->get('message')}}
    </div>
    @endif
    @yield('content')
</div>
</body>
</html>



