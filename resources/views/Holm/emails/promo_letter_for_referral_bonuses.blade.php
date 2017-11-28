
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


<body style="margin: 0; background: #fff; font-size:18px">

<table cellpadding="0" cellspacing="0" border="0" align="center"
       style="margin-top: 30px;
      border-collapse: collapse;
      -webkit-box-shadow: 0px 0px 101px 0px rgba(31, 31, 33, 0.15);
      box-shadow: 0px 0px 101px 0px rgba(31, 31, 33, 0.15); width: 100%; max-width: 940px;  background: url({{asset('img/letter_bg.png')}}) no-repeat bottom center;"
       bgcolor="#ffffff"
       class="container">
    <tr>
        <td   valign="top" align="left" bgcolor="#ffffff" style="color:#272c2b;padding-bottom: 40px;" >
            <table cellpadding="0" cellspacing="0" border="0"  style=" border-collapse: collapse;background-size: 100%;   margin: 0; padding: 10px 30px;" width="100%" class="content">
                <tr>
                    <td style="padding-left: 40px;" align="left"  valign="middle">
                        <img src="{{asset('img/logo.png')}}" alt="" class="logo"  style="width: 120px; float: left; "  >

                    </td>
                    <td style="padding-left: 30px;">
                        <img src="{{asset('img/l3.png')}}" alt="" class=""  style="width:  100% ; float: right; "  >
                    </td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td   valign="top" align="left" bgcolor="#ffffff"  style="color:#272c2b;font-family: 'Roboto', sans-serif;">
            <table cellpadding="0" cellspacing="0" border="0"  style="border-collapse: collapse; background-size: 100%;   margin: 0; " width="100%"  class="t-content">

                <tr>
                    <td style="padding: 30px 40px; background: #f9f9f9; "  valign="top" class="">
                        <h1  style=" font-size: 16px;display: inline-block;font-family: 'Lato', sans-serif; margin-bottom: 20px; font-weight: 700; color: #272c2b;  text-transform: uppercase;">
                            Hi
                        </h1>

                        <p style=" text-align: justify; font-weight: 300; margin: 10px 0;">
                            Congratulations on registering with Holm!
                        </p>
                        <p style=" text-align: justify; font-weight: 300; margin: 10px 0;">
                            In order to help spread the word about how we’re helping people receive better care, we are asking for your help.
                        </p>
                        <p style=" text-align: justify; font-weight: 300; margin: 10px 0;">
                            Share your referral code <b>{{$user->own_referral_code}}</b> with anyone who you think is either a great care worker,
                            or would benefit from receiving great care, and we’ll give each of you £100!*
                        </p>
                        <p style=" text-align: justify; font-weight: 300; margin: 10px 0;">
                            You can just tell them your code, or we can email them for you.

                        </p>
                        <a href="{{route('TermsPage')}}" class=""
                           style="text-transform: uppercase;
                  color: #7bb7dc;
                  font-weight: 700;
                  text-decoration: underline;">
                            *Terms & Conditions Apply
                        </a>
                        <p style=" text-align: center; font-weight: 300; margin: 10px 0;">
                            <a href="{{route('inviteReferUsers')}}" style="
                  padding: 10px 40px;
                  border-radius: 30px;
                  text-align: center;
                  background: #80cb2d;
                  font-family: 'Lato', sans-serif;
                  font-weight: 900;
                  color: #fff;
                  font-size: 14px;
                  text-transform: uppercase;
                  text-decoration: none !important;">
                                Refer</a>
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
                            best wishes <br />
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
                            If you do not wish to receive promotional emails from Holm,
                            <a href="{{route('unsubscribe',['id'=>$user->id])}}" class="">unsubscribe here</a>
                            <a href="#" style="
                       color: #7bb7dc;
                       text-decoration: underline;
                       font-size:15px;">
                                here.
                            </a>
                            You will continue to receive all other emails
                        </p>

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
