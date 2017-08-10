@extends(config('settings.theme').'.layouts.login')

@if (session('status'))
    @section('content')
    <section class="loginSection">
        <div class="loginLogo">
            <a href="/" class="loginLogo__item"></a>
        </div>
        <div class="loginBox ">
            <div class="thank">
                <h2 class="thank__title">
                    Thank you
                </h2>
                <span class="thank__ico">
         <i class="fa fa-check"></i>
       </span>
                <p class="info-p thank__info">
                    We have sent an email to <a href="#" class="thank__link">yourname@gmail.com</a>. Please click the link in that email to reset your password.

                </p>
            </div>
        </div>
    </section>
    @endsection
@else
    @section('content')
    <section class="loginSection">
        <div class="loginLogo">
            <a href="\" class="loginLogo__item"></a>
        </div>
        <div class="loginBox loginBox--recovery">
            <div class="login">
                <div class="login__header">
                    <h2>password recovery</h2>
                    <a href="/" class="closeModal">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="login__body">
                    <form id="login__form" class="login__form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <p class="info-p">
                            Please enter the email address of the password recovery
                        </p>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="formField">

                                <div class="fieldWrap">
                                    {{--<input type="text" class="formItem formItem--input" placeholder="Your Email">--}}
                                    <input id="email" type="email" class="formItem formItem--input"
                                           placeholder="Your Email" name="email" value="{{ old('email') }}" required>
                                    <span class="fieldIco">
                  <i class="fa fa-envelope"></i>
                </span>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <div class="login__footer">

                    <button class="actionsBtn  actionsBtn--get actionsBtn--full"
                            onclick="event.preventDefault();document.getElementById('login__form').submit();">
                        get new password
                    </button>
                </div>
            </div>
        </div>
    </section>
    @endsection

@endif




{{--@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
