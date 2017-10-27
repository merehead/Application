<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="some description">
    <meta name="keywords" content="some, words">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin/main2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/main4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/cupertino/jquery-ui.min.css')}}">
    <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/admin/main.js')}}"></script>
</head>
<body>
<div class="adminWrapper">
    <div class="adminBox">
        <div class="sidePanel">
            @yield('logoInfo')
            @yield('navigation')
        </div>
        @yield('content')
    </div>
</div>




</body>
</html>