<html lang="en" class="wf-lato-n7-active wf-lato-n4-active wf-active">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <title>Holm Care</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open Sans:300,400,500,700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="/css/main.min.css">
        <link rel="stylesheet" href="/css/customize.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext"
              media="all">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700&amp;subset=latin-ext"
              media="all">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
<body>
<div class="login">
    <div class="login__header">
        <h2>login</h2>
        <a href="#" class="closeModal">
            <i class="fa fa-times"></i>
        </a>
    </div>
    <form id="login__form" class="login__form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="login__body">
            <p class="label-p">Please log in to continue
            </p>

            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Email
                </h2>
                <div class="inputWrap">
                    <input type="text" class="formInput" name="email" placeholder="Your Email">
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="formField">
                <h2 class="formLabel questionForm__label">
                    Password
                </h2>
                <div class="inputWrap">
                    <input type="text" class="formInput " name="password" placeholder="******">
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="login__footer">
            <div class="login__row">
                <div class="checbox_wrap checbox_wrap--signedIn ">
                    <input type="checkbox" class="checkboxNew" id="check1">
                    <label for="check1"> <span>Stay signed in</span></label>
                </div>
                <div class="roundedBtn login__btn">
                    <button type="submit" href="" class="roundedBtn__item">
                        login
                    </button>
                </div>
            </div>


            <a href="{{route('password.request')}}" class="login__forgot">
                Forgot password?
            </a>
        </div>
    </form>
</div>
</body>
</html>