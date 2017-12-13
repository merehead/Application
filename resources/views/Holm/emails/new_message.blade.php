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
<body style="margin: 0; background: #fff;">
<table cellpadding="0" cellspacing="0" border="0" align="center"
       style="margin-top: 30px;
      border-collapse: collapse;
      font-size: 16px;
      -webkit-box-shadow: 0px 0px 101px 0px rgba(31, 31, 33, 0.15);
      box-shadow: 0px 0px 101px 0px rgba(31, 31, 33, 0.15); width: 100%; max-width: 940px;  background: url('img/letter_bg.png') no-repeat bottom center;"
       bgcolor="#ffffff"
       class="container">
    <tr>
        <td valign="top" align="left" bgcolor="#ffffff" style="padding-bottom: 40px;">
            <table cellpadding="0" cellspacing="0" border="0"
                   style=" border-collapse: collapse;background-size: 100%;   margin: 0; padding: 10px 30px;"
                   width="100%" class="content">
                <tr>
                    <td style="padding-left: 40px;" align="left" valign="middle">
                        <img src="{{asset('img/logo.png')}}" alt="" class="logo" style="width: 120px; float: left; ">

                    </td>
                    <td style="padding-left: 30px;">
                        <img src="{{asset('img/l1.png')}}" alt="" class="" style="width:  100% ; float: right; ">
                    </td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" align="left" bgcolor="#ffffff" style="font-family: 'Roboto', sans-serif;">
            <table cellpadding="0" cellspacing="0" border="0"
                   style="border-collapse: collapse; background-size: 100%;   margin: 0; " width="100%"
                   class="t-content">

                <tr>
                    <td style="padding: 30px 40px; background: #f9f9f9; font-family: 'Roboto', sans-serif; line-height: 1.5; "
                        valign="top" class="">
                        <h1 style="display: inline-block;font-family: 'Lato', sans-serif; margin-bottom: 20px; font-weight: 700; font-size: 16px; color: #272c2b;  text-transform: uppercase;">
                            DEAR {{($sender=='carer')?$server_users->like_name:$carer->like_name}}
                        </h1>

                        <p style=" text-align: justify; font-weight: 300; margin: 10px 0; font-size: 16px;">
                            @if($sender=='carer')
                                {{$carer->short_name}} has sent you a message. You can check it by going to your <a href="{{route('viewBookingDetails',['booking'=>$booking])}}?refer={{$booking->id}}">booking</a> page.
                            @else
                                {{$server_users->short_full_name}} has sent you a message. You can check it by going to your <a href="{{route('viewBookingDetails',['booking'=>$booking])}}?refer={{$booking->id}}">booking</a> page.
                            @endif
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" align="left" bgcolor="#ffffff" style="font-family: 'Roboto', sans-serif;">
            <table cellpadding="0" cellspacing="0" border="0" style="    margin: 0; " width="100%" class="t-content">

                <tr>
                    <td style="color:#272c2b;padding: 30px 40px; background: #fff; " valign="top" class="">
                        <p style="
                   text-transform: uppercase;
                   font-size: 14px;
                 margin-bottom:0;">
                            best wishes <br/>
                            The Holm Team
                        </p>
                        <a href="{{route('mainHomePage')}}" class=""
                           style="
                    color: #373c4d;
                    text-transform: uppercase;
                    font-weight: 700;
                    text-decoration: none;">
                            Holm.care
                        </a>
                    </td>

                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top" align="left" bgcolor="#ffffff" style="font-family: 'Roboto', sans-serif;">
            <table cellpadding="0" cellspacing="0" border="0" style="    margin: 0; " width="100%" class="t-content">

                <tr>
                    <td style="padding:  0 40px 30px 40px; background: #fff; " valign="top" class="">
                        <p style="max-width: 600px;font-size: 15px; color: #373f3e;line-height: 1.6;">
                            If you do not wish to receive promotional emails from Holm, <a
                                    href="{{route('unsubscribe',['id'=>Auth::user()->id])}}" class="">unsubscribe</a>
                            here.
                        </p>
                        <p style="max-width: 600px;font-size: 15px; color: #373f3e;line-height: 1.6;"> You will continue to receive all other emails.</p>
                    </td>
                    <td style="color:#272c2b;padding: 30px 40px; background: #fff; " valign="top" class="">
                        <ul style="float: right;">
                            <li style="list-style: none; display: inline-block;">
                                <a href="https://www.facebook.com/HolmCareUK/"
                                   style="margin-left: 10px; color: #a5a7af; ">
                                    <img src="{{asset('img/s1.png')}}" alt="">
                                </a>
                            </li>
                            <li style="list-style: none;display: inline-block;">
                                <a href="https://twitter.com/holmcare" style="margin-left: 10px; color: #a5a7af;">
                                    <img src="{{asset('img/s2.png')}}" alt="">
                                </a>
                            </li>
                            <li style="list-style: none;display: inline-block;">
                                <a href="https://plus.google.com/communities/102900900688938220709"
                                   style="margin-left: 10px; color: #a5a7af;">
                                    <img src="{{asset('img/s3.png')}}" alt="">
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
