@include('main.main')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <section class="loginSection">
        <div class="loginLogo">
            <a href="/" class="loginLogo__item"></a>
        </div>
        <div class="loginBox loginBox--set">
            <div class="login">
                <div class="login__header">
                    <h2>set a new password</h2>
                    <a href="/" class="closeModal">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="login__body" >

                    <form id="login__form" class="login__form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="formField">

                                <div class="fieldWrap">
                                    {{--<input type="text" class="formItem formItem--input" placeholder="Your Email">--}}
                                    <input id="email" type="email" class="formItem formItem--input {{$errors->has('email') ? ' formItem--error' : ''}}"
                                           placeholder="Your Email" name="email" value="{{ old('email') }}" required>
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
                                <h2 class="fieldLabel">new password</h2>
                                <div class="fieldWrap">
                                    <input id="password" type="password" class="formItem formItem--input {{ $errors->has('password') ? ' formItem--error' : '' }}" name="password" placeholder="********">
                                    <span class="fieldIco">
                  <i class="fa fa-lock"></i>
                </span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="formField">
                                <h2 class="fieldLabel">Repeat Password</h2>
                                <div class="fieldWrap">
                                    <input id="password-confirm" type="password" class="formItem formItem--input {{ $errors->has('password_confirmation') ? ' formItem--error' : '' }}" name="password_confirmation"
                                           placeholder="********">
                                    <span class="fieldIco">
                  <i class="fa fa-lock"></i>
                </span>
                                </div>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>


                    </form>
                </div>

                <div class="login__footer">

                    <button class="actionsBtn  actionsBtn--accept actionsBtn--full"
                            onclick="event.preventDefault();document.getElementById('login__form').submit();">
                        confirm password
                    </button>
                </div>
            </div>
        </div>
    </section>


@endsection



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

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
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
