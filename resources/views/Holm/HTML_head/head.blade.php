<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="{{$keywords??''}}" />
    <meta name="description" content="{{$description??''}}" />
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}">
    <title>{{$title}}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="{{asset('css/default.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/customize.css')}}">
    <link rel="stylesheet" href="{{asset('css/main2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cupertino/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/carousel/carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.timepicker.min.css')}}">
    @if((Auth::check() && Auth::user()->isAdmin()==true))
        <script>var is_admin = 1; </script>
    @else
        <script>var is_admin = 0; </script>
    @endif
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/checkCookie.js')}}"></script>

</head>