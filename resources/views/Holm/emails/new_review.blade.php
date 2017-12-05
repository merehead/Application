<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width">
    <title>
        Classical
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,600,700|Roboto:300,400,400i,500,700"
          rel="stylesheet">
    <style type="text/css">

        a:hover {
            text-decoration: none !important;
        }

        a {
            color: #71bc37;
            text-decoration: none;
        }

        @media screen and (max-width: 768px) {

            .logo {

                float: none;
                display: block;
            }
        }

        .title {
            padding: 15px;
        }
    </style>
</head>
<body style="margin: 0; background: #fff; font-size:18px">
<h1 style=" font-size: 16px;display: inline-block;font-family: 'Lato', sans-serif; margin-bottom: 20px; font-weight: 700; color: #272c2b;  text-transform: uppercase;">
    Hi, Nik!
</h1>
<p>
    You have a new review for moderation from <a href="{{route('ServiceUserProfilePublic',['serviceUserProfile'=>$server_users->id])}}?referUserProfilePublic={{$server_users->id}}">{{$server_users->short_full_name}}</a> for <a href="{{route('carerPublicProfile',['user_id'=>$carer_users->id])}}">{{$carer_users->short_name}}</a>
</p>
<p>
    Have a nice day!
</p>
</body>
</html>