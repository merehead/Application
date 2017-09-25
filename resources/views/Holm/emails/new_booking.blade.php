
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width">
    <title>
        Classical
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,600,700|Roboto:300,400,400i,500,700" rel="stylesheet">
    <style type="text/css">

        a:hover { text-decoration: none !important; }
        a {
            color: #71bc37;
            text-decoration: none; }
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
      -webkit-box-shadow: 0px 0px 101px 0px rgba(31, 31, 33, 0.15);
      box-shadow: 0px 0px 101px 0px rgba(31, 31, 33, 0.15); width: 100%; max-width: 940px; "
       bgcolor="#ffffff"
       class="container">
    <tr>
        <td   valign="top" align="left" bgcolor="#ffffff" style="padding-bottom: 40px;" >
            <table cellpadding="0" cellspacing="0" border="0"  style=" border-collapse: collapse;background-size: 100%;   margin: 0; padding: 10px 30px;" width="100%" class="content">
                <tr>
                    <td style="padding-left: 40px;" align="left"  valign="middle">
                        <img src="{{asset('img/logo.png')}}" alt="" class="logo"  style="width: 120px; float: left; "  >

                    </td>
                    <td style="padding-left: 30px;">
                        <img src="{{asset('img/l6.png')}}" alt="" class=""  style="width:  100% ; float: right; "  >
                    </td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td   valign="top" align="left" bgcolor="#ffffff"  style="font-family: 'Roboto', sans-serif;">
            <table cellpadding="0" cellspacing="0" border="0"  style="border-collapse: collapse; background-size: 100%;   margin: 0; " width="100%"  class="t-content">

                <tr>
                    <td style="padding: 30px 40px; background: #f9f9f9; "  valign="top" class="">
                        <h1 style="display: inline-block;font-family: 'Lato', sans-serif; margin-bottom: 20px; font-weight: 900; font-size: 24px; color: #272c2b;  text-transform: uppercase;">
                            Hello {{$user->userCarerProfile->first_name}}!
                        </h1>

                        <p style=" text-align: justify; font-weight: 300; margin: 10px 0;">
                            {{$serviceUsersProfile->first_name}} would like to book you on [date].
                            Please click the button below to accept or reject the booking request.
                            You can not be paid unless you complete the booking request.

                        </p>

                        <!-- <a href="#" class=""
                           style="text-transform: uppercase;
                           color: #7bb7dc;
                           font-weight: 700;
                           text-decoration: underline;">
                           Est eu pertinaciaen delacrue instructiol
                         </a> -->


                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>

        <td style="padding:40px ;">
            <table cellpadding="0" cellspacing="0" border="0"  style="overflow-x: auto;border: 1px solid rgb(225, 225, 225);box-shadow: 0px 0px 26.73px 0.27px rgba(0, 0, 0, 0.11);border-collapse: collapse;   margin: 0; " width="100%"  class="t-content">
                <tr>
                    <td style="padding: 20px 15px 30px 15px;  " valign="middle">

                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:middle;" >
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;" >
                                <tr>
                                    <td align="center" style="text-align:left; ">
                                        <img src="{{asset('/img/service_user_profile_photos/'.$serviceUsersProfile->id.'.png')}}" onerror="this.src='{{asset('/img/no_photo.png')}}'" alt="avatar" class="user"
                                             style="width: 70px;
                            display: block;
                            marign-top: 10px;
                            height: 70px;
                            border-radius: 50%;
                            object-fit: cover; -webkit-object-fit: cover;">


                                </tr>
                            </table>
                        </div>
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:middle;;" >
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;" >
                                <tr>
                                    <td align="center" style="text-align:left;">
                                        <p style=" margin-top: 10px;font-family: 'Lato', sans-serif;font-weight: 900; text-transform: uppercase;">
                                            <a href="{{route('ServiceUserProfilePublic',['serviceUserProfile'=>$serviceUsersProfile->id])}}" style=" color: #6178fc;">{{$serviceUsersProfile->first_name}}</a>
                                            <span style="display: block;">
                              Booked you
                            </span>
                                        </p>
                                </tr>
                            </table>
                        </div>
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:middle;;" >
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;" >
                                <tr>
                                    <td align="center" style="text-align:left;">
                                        <p style="margin-top: 10px;  font-size: 16px;font-family: 'Roboto', sans-serif;">
                            <span style="color: #909090;">
                              10 May 2017
                            </span>
                                            <span style="display: block; font-weight:700; ">
                              12:00 PM - 5:00 PM
                            </span>
                                        </p>
                                </tr>
                            </table>
                        </div>
                        <div class="column" style="width:100%;max-width:200px;display:inline-block;vertical-align:middle;;" >
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-spacing:0;" >
                                <tr>
                                    <td align="center" style="text-align:left;">
                                        <p style="margin-top: 10px;font-size: 25px;font-family: 'Lato', sans-serif;">
                            <span style="font-weight: 700;">
                             5h /
                            </span>
                                            <span style=" font-weight: 900;color:#80cb2d;">
                             £100
                            </span>
                                        </p>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td   valign="top" align="left" bgcolor="#ffffff"  >
            <table cellpadding="0" cellspacing="0" border="0"  style="border-collapse: collapse; background-size: 100%;   margin: 0; " width="100%"  class="t-content">               <tr>
                    <td style="padding: 30px 10px; background: #f9f9f9; "  valign="top" class="">
                        <a href="#" class=""
                           style="
                    display: block;
                    width: 240px;
                    line-height: 1.4;
                    margin: 0 auto;
                    padding: 10px 10px;
                    border-radius: 30px;
                    text-align: center;
                    background: #80cb2d;
                    text-transform: uppercase;
                    color: #7bb7dc;
                    font-family: 'Lato', sans-serif;
                    font-weight: 900;
                    color: #fff;
                    font-size: 14px;
                    text-decoration: none !important;">
                            Click here to Accept or <br />Reject Request
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td   valign="top" align="left" bgcolor="#ffffff"  style="font-family: 'Roboto', sans-serif;">
            <table cellpadding="0" cellspacing="0" border="0"  style="    margin: 0; " width="100%"  class="t-content">

                <tr>
                    <td style="padding: 30px 40px; background: #fff; "  valign="top" class="">
                        <p style="
                   text-transform: uppercase;
                   font-size: 14px;
                 margin-bottom:0;">
                            best wishes <br />
                            the holm team
                        </p>
                        <a href="#" class=""
                           style="
                    color: #373c4d;
                    text-transform: uppercase;
                    font-weight: 700;
                    text-decoration: none;">
                            Holm.com
                        </a>
                    </td>
                    <td style="padding: 30px 40px; background: #fff; "  valign="top" class="">
                        <ul style="float: right;">
                            <li  style="list-style: none; display: inline-block;">
                                <a href="https://www.facebook.com/HolmCareUK/" style="margin-left: 10px; color: #a5a7af; ">
                                    <img src="{{asset('img/s1.png')}}" alt="">
                                </a>
                            </li>
                            <li  style="list-style: none;display: inline-block;">
                                <a href="https://twitter.com/holmcare" style="margin-left: 10px; color: #a5a7af;">
                                    <img src="{{asset('img/s2.png')}}" alt="">
                                </a>
                            </li>
                            <li style="list-style: none;display: inline-block;">
                                <a href="https://plus.google.com/communities/102900900688938220709" style="margin-left: 10px; color: #a5a7af;">
                                    <img src="{{asset('img/s3.png')}}" alt="">
                                </a>
                            </li>
                            {{--                            <li style="list-style: none;display: inline-block;">
                                                            <a href="#" style="margin-left: 10px; color: #a5a7af;">
                                                                <img src="{{asset('img/s4.png')}}" alt="">
                                                            </a>
                                                        </li>--}}
                        </ul>
                    </td>
                </tr>
            </table>
        </td>
    </tr>


</table>





</body>
</html>