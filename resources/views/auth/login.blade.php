@extends(config('settings.theme').'.layouts.login')

@section('content')

    <section class="loginSection">
        <div class="loginLogo">
            <a href="/" class="loginLogo__item"></a>
        </div>
        <div class="loginBox">
            <div class="login">
                <div class="login__header">
                    <h2>Login</h2>
                    <a href="/" class="closeModal">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="login__body">

                    <form id="login__form" class="login__form" method="POST" action="{{ route('login') }}">

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="formField">
                                <h2 class="fieldLabel">Email</h2>
                                <div class="fieldWrap">
                                    <input id="email" type="email" name="email"
                                           class="formItem formItem--input {{$errors->has('email') ? ' formItem--error' : ''}}">
                                    <span class="fieldIco"><i class="fa fa-envelope"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="formField">
                                <h2 class="fieldLabel">Password</h2>
                                <div class="fieldWrap">
                                    <input id="password" type="password" name="password"
                                           class="formItem formItem--input {{$errors->has('password') ? ' formItem--error' : ''}}">
                                    <span class="fieldIco"><i class="fa fa-lock"></i></span>
                                </div>

                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </form>
                </div>

                <div class="login__footer">
                    <a href="{{ route('password.request') }}" class="forgotPass">
                        Forgot password?
                    </a>
                    <button class="actionsBtn actionsBtn--no-centered actionsBtn--filter actionsBtn--bigger"
                            onclick="event.preventDefault();document.getElementById('login__form').submit();">
                        login
                    </button>
                </div>

            </div>
        </div>
    </section>

    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Login</div>--}}
    {{--<div class="panel-body">--}}
    {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
    {{--{{ csrf_field() }}--}}

    {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

    {{--@if ($errors->has('email'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('email') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password" type="password" class="form-control" name="password" required>--}}

    {{--@if ($errors->has('password'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('password') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-6 col-md-offset-4">--}}
    {{--<div class="checkbox">--}}
    {{--<label>--}}
    {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
    {{--</label>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-8 col-md-offset-4">--}}
    {{--<button type="submit" class="btn btn-primary">--}}
    {{--Login--}}
    {{--</button>--}}

    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--Forgot Your Password?--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection
